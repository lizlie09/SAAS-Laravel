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

        $this->call(RolesSeeder::class);

        if(app()->environment('production')){

        } else {
            $this->call(UserSeeder::class);
        }
    }
}
