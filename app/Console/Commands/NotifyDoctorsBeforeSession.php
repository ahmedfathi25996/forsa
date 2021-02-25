<?php

namespace App\Console\Commands;

use App\models\doctors\doctors_sessions_m;
use App\models\notification_m;
use App\Notifications\mail\SessionReminder;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class NotifyDoctorsBeforeSession extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:BeforeDoctorSession';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        date_default_timezone_set("Africa/Cairo");

        $now = date('Y-m-d');
        $users = User::select(DB::raw("
            doctors_sessions.session_date,
            doctors_sessions.time_from,
            users.user_id

        "))-> join("doctors", function ($join){
            $join->on("doctors.user_id","=","users.user_id")
                ->whereNull("doctors.deleted_at");

        })->join("doctors_sessions", function ($join) use($now){
            $join->on("doctors_sessions.doctor_id","=","doctors.doctor_id")
                ->where("doctors_sessions.is_done",0)
                ->where("doctors_sessions.is_booked",1)->
                where("doctors_sessions.session_date",">=",$now)
                ->whereNull("doctors_sessions.deleted_at");

        })
            ->get();

        foreach($users as $user) {
            $session_date = $user->session_date;
            $time_from = $user->time_from;

            $time = new \DateTime($session_date." ".$time_from);

            $diff = $time->diff(new \DateTime());
            $minutes = ($diff->days * 24 * 60) +
                ($diff->h * 60) + $diff->i;

            if($time > new \DateTime("now"))
            {
                if($minutes < 60)
                {
                    notification_m::create([
                        "to_user_id" => $user->user_id,
                        "to_user_type" => "doctor",
                        "not_type" => "session_reminder",
                        "not_title" => "You have session at ".$time_from." ".$session_date
                    ]);
                    $user->notify((new SessionReminder($user,$time_from,$session_date)));

                }
            }



        }
    }
}
