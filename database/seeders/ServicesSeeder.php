<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'title' => 'Home Welding',
            'excerpt' => 'when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal',
            'description' => '<p>when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal</p>',
            'status' => 1,
            'photo' => 's1.png'
        ]);

        DB::table('services')->insert([
            'title' => 'Machine Welding',
            'excerpt' => 'when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal',
            'description' => '<p>when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal</p>',
            'status' => 1,
            'photo' => 's2.png'
        ]);

        DB::table('services')->insert([
            'title' => 'Car Welding',
            'excerpt' => 'when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal',
            'description' => '<p>when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal</p>',
            'status' => 1,
            'photo' => 's3.png'
        ]);

        DB::table('services')->insert([
            'title' => 'Hoime Welding',
            'excerpt' => 'when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal',
            'description' => '<p>when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal</p>',
            'status' => 1,
            'photo' => 's4.png'
        ]);

        DB::table('services')->insert([
            'title' => 'Machine Welding',
            'excerpt' => 'when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal',
            'description' => '<p>when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal</p>',
            'status' => 1,
            'photo' => 's5.png'
        ]);

        DB::table('services')->insert([
            'title' => 'Car Welding',
            'excerpt' => 'when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal',
            'description' => '<p>when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal</p>',
            'status' => 1,
            'photo' => 's6.png'
        ]);
    }
}
