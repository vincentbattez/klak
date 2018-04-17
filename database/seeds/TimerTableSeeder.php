<?php

use Illuminate\Database\Seeder;

class TimerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Timer::class, 150)->create();
    }
}
