<?php

declare(strict_types=1);

namespace Codeat3\BladePhosphorIcons;

use BladeUI\Icons\Factory;
use Illuminate\Support\ServiceProvider;

final class BladePhosphorIconsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->callAfterResolving(Factory::class, function (Factory $factory) {
            $factory->add('phosphor-icons', [
                'path' => __DIR__.'/../resources/svg',
                'prefix' => 'phosphor',
            ]);
        });
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/svg' => public_path('vendor/blade-phosphor-icons'),
            ], 'blade-phosphor-icons');
        }
    }
}
