<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class cache_files extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cache:files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'when finishing any updates run this command to cache necessary files to increase project speed';

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

        $this->line("");
        $bar = $this->output->createProgressBar(3);

        $bar->start();

        Artisan::call('config:cache'); // Create a cache file for faster configuration loading
        $bar->advance(1);
        Artisan::call('view:cache'); //   Compile all of the application's Blade templates
        $bar->advance(1);
        Artisan::call('route:cache'); //  Create a route cache file for faster route registration
        $bar->advance(1);

        $bar->finish();

        $this->line("");
        $this->line("");
        $this->info("Files of (config - views - route) have been cached");
        $this->line("");

    }
}
