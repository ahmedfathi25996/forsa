<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\NotifyUsersDaily',
        'App\Console\Commands\NotifyDoctorsDaily',
        'App\Console\Commands\NotifyUsersBeforeSession',
        'App\Console\Commands\NotifyDoctorsBeforeSession'


    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('users:BeforeDoctorSession')->everyMinute();
        $schedule->command('users:BeforeUserSession')->everyMinute();
        $schedule->command('users:notifyUsersDaily')->dailyAt('23:55');
        $schedule->command('users:notifyDoctorsDaily')->dailyAt("23:55");


    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
