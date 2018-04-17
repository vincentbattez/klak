<?php

use Illuminate\Database\Seeder;

class TeamUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TeamUsers::class, 10)->create();
    }
}
