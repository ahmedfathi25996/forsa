<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             users::class,
             langs::class,
             payment_method::class,
             settings::class,
         ]);
    }
}
