<?php

use Illuminate\Database\Seeder;

class langs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('langs')->insert([
            'lang_symbole'         => "en",
            'lang_text'            => 'English (US)',
            'lang_direction'       => 'rtl',
            'created_at'           => date("Y-m-d H:i:s"),
            'updated_at'           => date("Y-m-d H:i:s"),
        ]);
    }
}
