<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlidesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slides')->insert([
            'title' => 'We Provide <br>Welding Services',
            'description' => Str::random(20),
            'status' => 1,
            'button_name' => 'Contact Us',
            'links' => './contact'
        ]);

        DB::table('slides')->insert([
            'title' => 'We Provide <br>Car Welding Services',
            'description' => Str::random(20),
            'status' => 1,
            'button_name' => 'About Us',
            'links' => './about'
        ]);

    }
}
