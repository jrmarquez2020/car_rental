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
        // You can register custom Artisan commands here.
        // Example:
        // \App\Console\Commands\YourCustomCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Example: Schedule a daily task
        // $schedule->command('your:command')->daily();
        
        // You can define more complex schedules here.
    }

    /**
     * Register the commands for your application.
     *
     * @return void
     */
    protected function commands()
    {
        // Load the routes for console commands
        require base_path('routes/console.php');
    }
}
