<?php

namespace TimeHunter\LaravelApiModuleGenerator\Commands;

use Illuminate\Console\Command;
use TimeHunter\LaravelApiModuleGenerator\Facades\LaravelApiModuleGenerator;


class LaravelApiModuleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laravel-api-module:make';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A lightweight module creator from api endpoints';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $schema = config('laravelapimodulegenerator');

        LaravelApiModuleGenerator::publish($schema);
    }
}
