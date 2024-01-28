<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            'name' => Str::random(15),
            'designation' => 'supervisor',
            'status' => 1,
            'photo' => 't1.jpg'
        ]);

        DB::table('teams')->insert([
            'name' => Str::random(15),
            'designation' => 'supervisor',
            'status' => 1,
            'photo' => 't2.jpg'
        ]);

        DB::table('teams')->insert([
            'name' => Str::random(15),
            'designation' => 'supervisor',
            'status' => 1,
            'photo' => 't3.jpg'
        ]);
    }
}
