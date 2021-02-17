<?php

use Illuminate\Database\Seeder;

class payment_method extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        #region cash_on_delivery

            $id = \Illuminate\Support\Facades\DB::table('payment_method')->insertGetId([
                'payment_type'         => "cash_on_delivery",
                'created_at'           => date("Y-m-d H:i:s"),
                'updated_at'           => date("Y-m-d H:i:s"),
            ]);

            \Illuminate\Support\Facades\DB::table('payment_method_translate')->insert([
                'payment_method_id'         => $id,
                'payment_method_name'       => "Cash",
                'lang_id'                   => 1,
                'created_at'                => date("Y-m-d H:i:s"),
                'updated_at'                => date("Y-m-d H:i:s"),
            ]);

        #endregion


        #region paypal

            $id = \Illuminate\Support\Facades\DB::table('payment_method')->insertGetId([
                'payment_type'         => "paypal",
                'created_at'           => date("Y-m-d H:i:s"),
                'updated_at'           => date("Y-m-d H:i:s"),
            ]);

            \Illuminate\Support\Facades\DB::table('payment_method_translate')->insert([
                'payment_method_id'         => $id,
                'payment_method_name'       => "PayPal",
                'lang_id'                   => 1,
                'created_at'                => date("Y-m-d H:i:s"),
                'updated_at'                => date("Y-m-d H:i:s"),
            ]);

        #endregion


    }
}
