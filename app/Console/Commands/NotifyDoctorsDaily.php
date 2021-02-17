<?php

namespace App\Console\Commands;

use App\models\doctors\doctors_m;
use App\models\doctors\doctors_sessions_m;
use App\models\notification_m;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class NotifyDoctorsDaily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'doctors:notifyDaily';

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
        $now = date('Y-m-d');
        $users = doctors_sessions_m::select(DB::raw("
            doctors_sessions.*,
            users.user_id


        "))
            ->join("doctors", function ($join){
                $join->on("doctors.doctor_id","=","doctors_sessions.doctor_id")
                    ->whereNull("doctors.deleted_at");

            })->join("users", function ($join){
                $join->on("users.user_id","=","doctors.user_id")
                    ->whereNull("users.deleted_at");

            })->
            where("doctors_sessions.is_booked",1)->
            where("doctors_sessions.is_done",0)->
            where("doctors_sessions.session_date",">=",$now)->
            get();
        foreach($users as $user) {
            $date = $user->session_date;
            $time = $user->time_from;
            notification_m::create([
                "to_user_id" => $user->user_id,
                "to_user_type" => "doctor",
                "not_type" => "session_reminder",
                "not_title" => "You have session at ".$time." ".$date
            ]);
        }
    }
}
