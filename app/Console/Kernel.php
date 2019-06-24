<?php

namespace App\Console;

use App\Models\Key;
use App\Models\Lottery;
use Illuminate\Support\Facades\DB;
use App\Models\Event;
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
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $events = new Event();
        $event = $events->getNextEvent();

        $timestampNow = round((time()+10800)/60)*60;
        $timestampEvent = round( $event->timestamp/60)*60;

        $schedule->call(function () use ($timestampNow, $timestampEvent) {
            if ($timestampNow === $timestampEvent) {

                $keys = Key::select('id')
                    ->where('active', 1)
                    ->get();

                $count = count($keys);

                $winner = $keys[rand(0, $count-1)];

                $lottery = new Lottery();

                $lottery->active = 1;
                $lottery->key_id = $winner->id;

                $lottery->save();

            }
        })->everyMinute();
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
