<?php

namespace Shore\LaravelPreset;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Console\PresetCommand;

class PresetServiceProvider extends ServiceProvider
{
    public function boot()
    {
        PresetCommand::macro('shore', function ($command) {
            Preset::install();

            $command->info('Shore scaffolding installed successfully.');
            $command->info('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });
    }
}
