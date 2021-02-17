<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class setup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:new';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup new project that make migrations and necessary actions after it';

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
        $bar = $this->output->createProgressBar(43);

        $bar->start();

        Artisan::call("key:generate");
        $bar->advance(1);
        Artisan::call("migrate");
        $bar->advance(1);
        Artisan::call("passport:install");
        $bar->advance(1);
        Artisan::call("db:seed");
        $bar->advance(1);

        $bar->finish();

        $this->line("");
        $this->line("");
        $this->info("Your project now is ready to work...");
        $this->line("");

    }
}
