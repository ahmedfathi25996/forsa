<?php

namespace App\Console\Commands;

use App\models\notification_m;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class NotifyUsersDaily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:notifyDaily';

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
        $users = User::select(DB::raw("
            booking.*,
            doctors_sessions.session_date,
            doctors_sessions.time_from,
            booking.user_id as doctor_user_id,
            doc_trans.full_name


        "))->join("booking", function ($join){
            $join->on("booking.user_id","=","users.user_id")
                ->whereNull("booking.deleted_at");

        })->join("doctors_sessions", function ($join) use($now){
            $join->on("doctors_sessions.session_id","=","booking.session_id")
                ->where("doctors_sessions.is_done",0)->
                where("doctors_sessions.session_date",">=",$now)
                ->whereNull("doctors_sessions.deleted_at");

        })->join("doctors_translate as doc_trans", function ($join){
            $join->on("doc_trans.doctor_id","=","doctors_sessions.doctor_id")
                ->where("doc_trans.lang_id",1)
                ->whereNull("doc_trans.deleted_at");

        })->get();
        foreach($users as $user) {
            $date = $user->session_date;
            $time = $user->time_from;
            $doctor_name = $user->full_name;
            notification_m::create([
               "to_user_id" => $user->doctor_user_id,
                "to_user_type" => "user",
                "not_type" => "session_reminder",
                "not_title" => "You have session with Dr. ".$doctor_name." at ".$time." ".$date
            ]);
        }
    }
}
