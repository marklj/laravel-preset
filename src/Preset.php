<?php

namespace Shore\LaravelPreset;

use Illuminate\Support\Arr;
use Illuminate\Container\Container;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\Presets\Preset as BasePreset;

class Preset extends BasePreset
{
    public static function install()
    {
        static::ensureComponentDirectoryExists();
        static::updatePackages();
        static::updateStyles();
        static::updateWebpackConfiguration();
        static::updateJavaScript();
        static::updateTemplates();
        static::removeNodeModules();
        static::updateGitignore();
        static::updateProviders();
        static::updateRoutes();
        static::updateControllers();
    }

    protected static function updatePackageArray(array $packages)
    {
        return array_merge([
            'laravel-mix-purgecss' => '^2.2.0',
            'postcss-nesting' => '^5.0.0',
            'postcss-import' => '^11.1.0',
            'tailwindcss' => '>=0.5.3',
        ], Arr::except($packages, [
            'bootstrap',
            'bootstrap-sass',
            'jquery',
            'popper.js',
        ]));
    }

    protected static function updateWebpackConfiguration()
    {
        copy(__DIR__.'/stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }

    protected static function updateStyles()
    {
        tap(new Filesystem, function ($files) {
            $files->deleteDirectory(resource_path('sass'));
            $files->delete(public_path('js/app.js'));
            $files->delete(public_path('css/app.css'));

            if (! $files->isDirectory($directory = resource_path('css'))) {
                $files->makeDirectory($directory, 0755, true);
            }
        });

        copy(__DIR__.'/stubs/resources/css/app.css', resource_path('css/app.css'));
    }

    protected static function updateJavaScript()
    {
        tap(new Filesystem, function ($files) {
            $files->delete(resource_path('js/bootstrap.js'));
            $files->delete(resource_path('js/components/ExampleComponent.vue'));
            $files->copyDirectory(__DIR__.'/stubs/resources/js/components', resource_path('js/components'));
            $files->delete(base_path('package.json'));
        });
        copy(__DIR__.'/stubs/app.js', resource_path('js/app.js'));
        copy(__DIR__.'/stubs/package.json', base_path('package.json'));
    }

    protected static function updateTemplates()
    {
        tap(new Filesystem, function ($files) {
            $files->delete(resource_path('views/home.blade.php'));
            $files->delete(resource_path('views/welcome.blade.php'));
            $files->copyDirectory(__DIR__.'/stubs/views', resource_path('views'));
        });
    }

    protected static function updateGitignore()
    {
        copy(__DIR__.'/stubs/gitignore-stub', base_path('.gitignore'));
    }

    protected static function updateProviders()
    {
        tap(new Filesystem, function ($files) {
            $files->delete(app_path('Providers/AppServiceProvider.php'));
        });
        copy(__DIR__.'/stubs/providers/AppServiceProvider.php', app_path('Providers/AppServiceProvider.php'));
    }

    protected static function updateRoutes()
    {
        tap(new Filesystem, function ($files) {
            $files->delete(base_path('routes/web.php'));
        });
        copy(__DIR__.'/stubs/routes/web.php', base_path('routes/web.php'));
    }
    protected static function updateControllers()
    {
        tap(new Filesystem, function ($files) {
            $files->delete(app_path('Http/HomeController.php'));
        });
        copy(__DIR__.'/stubs/controllers/HomeController.php', app_path('Http/Controllers/HomeController.php'));
    }
}
