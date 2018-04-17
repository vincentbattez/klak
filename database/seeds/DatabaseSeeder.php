<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TeamTableSeeder::class);
        $this->call(TeamUsersTableSeeder::class);
        $this->call(ProjectTableSeeder::class);
        $this->call(TaskTableSeeder::class);
        $this->call(TimerTableSeeder::class);
    }
}
