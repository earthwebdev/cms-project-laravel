<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('testimonials')->insert([
            'name' => Str::random(20),
            'description' => Str::random(20),
            'status' => 1,
            'photo' => 'client.jpg'
        ]);

        DB::table('testimonials')->insert([
            'name' => Str::random(20),
            'description' => Str::random(20),
            'status' => 1,
            'photo' => 'client.jpg'
        ]);
    }
}
