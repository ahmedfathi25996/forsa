<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class clear_cache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear cache of (config - views - route)';

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
        $bar = $this->output->createProgressBar(4);

        $bar->start();

        Artisan::call('cache:clear'); //  Flush the application cache
        $bar->advance(1);
        Artisan::call('config:clear'); // Remove the configuration cache file
        $bar->advance(1);
        Artisan::call('view:clear'); //   Clear all compiled view files
        $bar->advance(1);
        Artisan::call('route:clear'); //  Remove the route cache file
        $bar->advance(1);

        $bar->finish();

        $this->line("");
        $this->line("");
        $this->info("Cache files of (config - views - route) have been cleared");
        $this->line("");

    }


}
