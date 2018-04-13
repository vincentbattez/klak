<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $year    = rand(2000,2017);
        $month   = rand(1,12);
        $day     = rand(1,28);
        $hour    = rand(1,24);
        $minute  = rand(1,59);
        $seconde = rand(1,60);

        $yearUpdate = rand($year, 2018);
        $monthUpdate = rand($month + 1, 11);

        DB::table('klak_users')->insert([
            'name'       => str_random(10),
            'email'      => str_random(10).'@gmail.com',
            'password'   => bcrypt('secret'),
            'created_at' => Carbon::create(
                $year, 
                $month, 
                rand(1,28), 
                rand(1,24), 
                rand(1,59), 
                rand(1,60)
            )->format('Y-m-d H:i:s'),

            'updated_at' => Carbon::create(
                $yearUpdate, 
                $monthUpdate, 
                rand(1,28), 
                rand(1,24), 
                rand(1,59), 
                rand(1,60)
            )->format('Y-m-d H:i:s'),
        ]);
    }
}
