<?php

namespace App\Jobs;

use App\models\token_push\token_push_m;
use App\models\user_push_notifications_m;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Edujugon\PushNotification\PushNotification;

class send_push implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $usersTokens;
    public $data;
    public $offset;
    public $limit;
    public $recursion;
    public $device_type;
    public $sound = "";

    public function __construct($usersTokens=[],$data,$offset=0,$limit=0,$recursion = false,$device_type='')
    {
        $this->usersTokens  = $usersTokens;
        $this->data         = $data;
        $this->offset       = $offset;
        $this->limit        = $limit;
        $this->recursion    = $recursion;
        $this->device_type  = $device_type ;
    }


    public function handle()
    {

        $allData    = collect($this->usersTokens);
        $user_ids   = $allData->pluck("user_id");
        $devices    =  $allData->groupBy('device_type');

        $android    = isset($devices['android'])?$devices['android']->pluck('push_token'):[];
        $ios        = isset($devices['ios'])?$devices['ios']->pluck('push_token'):[];

        $this->sendAndroid($android);

        $this->sendIphone($ios);

        $this->logUserPush($user_ids);

        if ($this->recursion){

            $offset     = $this->offset + $this->limit;
            $usersToken = User::get_users_tokens($this->device_type,$offset,$this->limit);

            if (is_array($usersToken) && count($usersToken) > 0 ){
                dispatch(new send_push(
                    $usersToken,
                    $this->data,
                    $offset,
                    $this->limit,
                    $this->recursion,
                    $this->device_type
                ));
            }

        }

    }

    private function sendAndroid($devices)
    {

        if (is_array($devices) && count($devices) > 0)
        {
            $pushAndroid  = new PushNotification('fcm');

            $pushAndroid->setMessage([
                'data' => [
                    'title'         => $this->data['title'] ?? "",
                    'body'          => $this->data['body'] ?? "",
                    'sound'         => $this->sound,
                    'addition_data' => $this->data['addition_data'] ?? [],
                ]
            ]);

            $pushAndroid->setApiKey('AAAA9IYWGzw:APA91bFd7f32NuhRGLrW_5q_6rMhKpbQZgFGygc3Cbqaisi-g3cQN6kjSbJeClTgSfocj8Lfadl1-DGHWQV1j3SzOOtZqX3DuWG-i6yaSdkj_gjnYSb1Rmg2nF_Li39G3GeT4QSeE2Ph');
            $pushAndroid->setDevicesToken($devices->toArray());
            $pushAndroid->send()->getFeedback();

            $invalidTokens = $pushAndroid->getUnregisteredDeviceTokens();
            $this->removeUnregisteredTokens($invalidTokens);

        }


    }

    private function sendIphone($devices)
    {
        if (is_array($devices) && count($devices) > 0)
        {
            $pushIos = new PushNotification('apn');
            $pushIos->setMessage([
                'aps' => [
                    'alert'         => [
                        'title' => $this->data['title'] ?? "",
                        'body'  => $this->data['body'] ?? "",
                    ],
                    'sound'         => $this->sound,
                    'badge'         => 1,
                    'extraPayLoad'  => $this->data['addition_data'] ?? []
                ],

            ])
                ->setDevicesToken($devices->toArray())
                ->send()->getFeedback();

            $invalidTokens = $pushIos->getUnregisteredDeviceTokens();
            $this->removeUnregisteredTokens($invalidTokens);

        }
    }

    private function logUserPush($user_ids)
    {

        if(is_array($user_ids) && count($user_ids) > 0)
        {

            $bulkInsertion = [];

            foreach($user_ids as $key => $user_id)
            {

                if($user_id > 0)
                {

                    $addition_data = [];
                    if(isset($this->data['addition_data']))
                    {
                        $addition_data = $this->data['addition_data'];
                    }

                    $item =
                    [
                        "user_id"           => $user_id,
                        "not_title"         => $this->data['title'] ?? "",
                        "not_body"          => $this->data['body'] ?? "",
                        "additional_data"   => json_encode($addition_data),
                    ];

                    $bulkInsertion[] = $item;

                }

            }

            if(is_array($bulkInsertion) && count($bulkInsertion) > 0)
            {
                user_push_notifications_m::insert($bulkInsertion);
            }

        }

    }

    private function removeUnregisteredTokens($tokens)
    {

        if(is_array($tokens) && count($tokens) > 0)
        {
            token_push_m::whereIn('push_token', $tokens)->delete();
        }

    }

}