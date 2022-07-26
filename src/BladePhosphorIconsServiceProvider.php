<?php

declare(strict_types=1);

namespace Codeat3\BladePhosphorIcons;

use BladeUI\Icons\Factory;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

final class BladePhosphorIconsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();

        $this->callAfterResolving(Factory::class, function (Factory $factory, Container $container) {
            $config = $container->make('config')->get('blade-phosphor-icons', []);

            $factory->add('phosphor-icons', array_merge(['path' => __DIR__ . '/../resources/svg'], $config));
        });
    }

    private function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/blade-phosphor-icons.php', 'blade-phosphor-icons');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/svg' => public_path('vendor/blade-phosphor-icons'),
            ], 'blade-phosphor-icons');

            $this->publishes([
                __DIR__ . '/../config/blade-phosphor-icons.php' => $this->app->configPath('blade-phosphor-icons.php'),
            ], 'blade-phosphor-icons-config');
        }
    }
}
