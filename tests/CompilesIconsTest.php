<?php

declare(strict_types=1);

namespace Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Config;
use BladeUI\Icons\BladeIconsServiceProvider;
use Codeat3\BladePhosphorIcons\BladePhosphorIconsServiceProvider;

class CompilesIconsTest extends TestCase
{
    /** @test */
    public function it_compiles_a_single_anonymous_component()
    {
        $result = svg('phosphor-alarm')->toHtml();

        // Note: the empty class here seems to be a Blade components bug.
        $expected = <<<'SVG'
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M184,120a8,8,0,0,1,0,16H128a7.99977,7.99977,0,0,1-8-8V72a8,8,0,0,1,16,0v48Zm11.88232-59.88232A96.00033,96.00033,0,1,1,128,32,95.37279,95.37279,0,0,1,195.88232,60.11768ZM208,128a80.00062,80.00062,0,1,0-23.43164,56.56836A79.47459,79.47459,0,0,0,208,128Zm27.48047-73.53906L201.53906,20.51953a8,8,0,0,0-11.31347,11.314L224.1665,65.77441a8,8,0,1,0,11.314-11.31347ZM65.77441,20.51953a8,8,0,0,0-11.31347,0L20.51953,54.46094a8,8,0,0,0,11.314,11.31347L65.77441,31.8335A7.99973,7.99973,0,0,0,65.77441,20.51953Z"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_classes_to_icons()
    {
        $result = svg('phosphor-alarm', 'w-6 h-6 text-gray-500')->toHtml();

        $expected = <<<'SVG'
            <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M184,120a8,8,0,0,1,0,16H128a7.99977,7.99977,0,0,1-8-8V72a8,8,0,0,1,16,0v48Zm11.88232-59.88232A96.00033,96.00033,0,1,1,128,32,95.37279,95.37279,0,0,1,195.88232,60.11768ZM208,128a80.00062,80.00062,0,1,0-23.43164,56.56836A79.47459,79.47459,0,0,0,208,128Zm27.48047-73.53906L201.53906,20.51953a8,8,0,0,0-11.31347,11.314L224.1665,65.77441a8,8,0,1,0,11.314-11.31347ZM65.77441,20.51953a8,8,0,0,0-11.31347,0L20.51953,54.46094a8,8,0,0,0,11.314,11.31347L65.77441,31.8335A7.99973,7.99973,0,0,0,65.77441,20.51953Z"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_styles_to_icons()
    {
        $result = svg('phosphor-alarm', ['style' => 'color: #555'])->toHtml();

        $expected = <<<'SVG'
            <svg style="color: #555" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M184,120a8,8,0,0,1,0,16H128a7.99977,7.99977,0,0,1-8-8V72a8,8,0,0,1,16,0v48Zm11.88232-59.88232A96.00033,96.00033,0,1,1,128,32,95.37279,95.37279,0,0,1,195.88232,60.11768ZM208,128a80.00062,80.00062,0,1,0-23.43164,56.56836A79.47459,79.47459,0,0,0,208,128Zm27.48047-73.53906L201.53906,20.51953a8,8,0,0,0-11.31347,11.314L224.1665,65.77441a8,8,0,1,0,11.314-11.31347ZM65.77441,20.51953a8,8,0,0,0-11.31347,0L20.51953,54.46094a8,8,0,0,0,11.314,11.31347L65.77441,31.8335A7.99973,7.99973,0,0,0,65.77441,20.51953Z"/></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_default_class_from_config()
    {
        Config::set('blade-phosphor-icons.class', 'awesome');

        $result = svg('phosphor-alarm')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M184,120a8,8,0,0,1,0,16H128a7.99977,7.99977,0,0,1-8-8V72a8,8,0,0,1,16,0v48Zm11.88232-59.88232A96.00033,96.00033,0,1,1,128,32,95.37279,95.37279,0,0,1,195.88232,60.11768ZM208,128a80.00062,80.00062,0,1,0-23.43164,56.56836A79.47459,79.47459,0,0,0,208,128Zm27.48047-73.53906L201.53906,20.51953a8,8,0,0,0-11.31347,11.314L224.1665,65.77441a8,8,0,1,0,11.314-11.31347ZM65.77441,20.51953a8,8,0,0,0-11.31347,0L20.51953,54.46094a8,8,0,0,0,11.314,11.31347L65.77441,31.8335A7.99973,7.99973,0,0,0,65.77441,20.51953Z"/></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    /** @test */
    public function it_can_merge_default_class_from_config()
    {
        Config::set('blade-phosphor-icons.class', 'awesome');

        $result = svg('phosphor-alarm', 'w-6 h-6')->toHtml();

        $expected = <<<'SVG'
            <svg class="awesome w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M184,120a8,8,0,0,1,0,16H128a7.99977,7.99977,0,0,1-8-8V72a8,8,0,0,1,16,0v48Zm11.88232-59.88232A96.00033,96.00033,0,1,1,128,32,95.37279,95.37279,0,0,1,195.88232,60.11768ZM208,128a80.00062,80.00062,0,1,0-23.43164,56.56836A79.47459,79.47459,0,0,0,208,128Zm27.48047-73.53906L201.53906,20.51953a8,8,0,0,0-11.31347,11.314L224.1665,65.77441a8,8,0,1,0,11.314-11.31347ZM65.77441,20.51953a8,8,0,0,0-11.31347,0L20.51953,54.46094a8,8,0,0,0,11.314,11.31347L65.77441,31.8335A7.99973,7.99973,0,0,0,65.77441,20.51953Z"/></svg>
            SVG;

        $this->assertSame($expected, $result);

    }

    protected function getPackageProviders($app)
    {
        return [
            BladeIconsServiceProvider::class,
            BladePhosphorIconsServiceProvider::class,
        ];
    }
}
