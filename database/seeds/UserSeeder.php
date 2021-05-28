<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Teams;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $team = factory(Teams::class)->create([
            'name' => 'Never Surrender'
        ]);


        $user = factory(User::class)->create([
                'name' => 'Lizlie Precyrose',
                'last_name' => 'Micayabas',
                'team_id' => $team->id,
                'email' => 'test11@example.com'
        ]);
        $user->assignRole('team_lead');

        
        $user = factory(User::class)->create([
            'name' => 'Maximo',
            'last_name' => 'Macalandag',
            'team_id' => $team->id,
            'email' => 'test117@example.com'
        ]);
        $user->assignRole('user');


    }
}
