<?php

use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'full_name'         => "Administrator",
            'email'             => 'admin@admin.com',
            'password'          => bcrypt('123'),
            'user_type'         => 'dev',
            'is_active'         => 1,
            'is_verified'       => 1,
            'display_lang_id'   => 1,
            'created_at'        => date("Y-m-d H:i:s"),
            'updated_at'        => date("Y-m-d H:i:s"),
        ]);
    }
}
