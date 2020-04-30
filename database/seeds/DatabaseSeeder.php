<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        App\Schedule::create([
            'jadwal'=> Carbon::parse('26-08-2019 09:20:00')
        ]);
        App\Schedule::create([
            'jadwal'=> Carbon::parse('26-08-2019 11:20:00')
        ]);
        App\Schedule::create([
            'jadwal'=> Carbon::parse('26-08-2019 13:20:00')
        ]);
        App\Schedule::create([
            'jadwal'=> Carbon::parse('27-08-2019 09:20:00')
        ]);
        App\Schedule::create([
            'jadwal'=> Carbon::parse('27-08-2019 11:20:00')
        ]);
        App\Schedule::create([
            'jadwal'=> Carbon::parse('27-08-2019 13:20:00')
        ]);
        App\Schedule::create([
            'jadwal'=> Carbon::parse('27-08-2019 15:20:00')
        ]);
        App\Schedule::create([
            'jadwal'=> Carbon::parse('28-08-2019 09:20:00')
        ]);
        App\Schedule::create([
            'jadwal'=> Carbon::parse('28-08-2019 11:20:00')
        ]);
        App\Schedule::create([
            'jadwal'=> Carbon::parse('28-08-2019 13:20:00')
        ]);
    }
}
