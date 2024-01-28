<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'company_name' => 'Finter'
        ]);

        DB::table('settings')->insert([
            'company' => 1
        ]);

        DB::table('settings')->insert([
            'location' => 'location'
        ]);

        DB::table('settings')->insert([
            'phone' => '+01 1234567890'
        ]);

        DB::table('settings')->insert([
            'email' => 'admin@admin.com'
        ]);

        DB::table('settings')->insert([
            'facebook' => 'https://facebook.com'
        ]);

        DB::table('settings')->insert([
            'twitter' => 'https://twitter.com'
        ]);

        DB::table('settings')->insert([
            'linkedin' => 'https://linkedin.com'
        ]);

        DB::table('settings')->insert([
            'instagram' => 'https://instagram.com'
        ]);

        DB::table('settings')->insert([
            'logo' => 'logo.jpg'
        ]);

        DB::table('settings')->insert([
            'home_about_image' => 'front/images/about_img.jpg'
        ]);

        DB::table('settings')->insert([
            'home_about' => '<div class="heading_container"><h2 class="">About Us</h2></div><p class="detail_p_mt">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, orThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, orThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or</p><p><a class="" href="../about"> Read More </a></p>'
        ]);

        DB::table('settings')->insert([
            'home_service' => '<h2>Our Services</h2><p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything<br>&nbsp; &nbsp;&nbsp;</p>'
        ]);

        DB::table('settings')->insert([
            'footer_company' => '<h5>Company</h5><p>Randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<br>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>'
        ]);

        DB::table('settings')->insert([
            'footer_service' => '<h5>Services</h5><p>Randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure</p>'
        ]);



        DB::table('settings')->insert([
            'copyright' => '<p>&copy;  <span id="displayYear">2024</span> All Rights Reserved. By <a target="_blank" rel="nofollow noopener" href="#">Cms Project Design</a></p>'
        ]);

        DB::table('settings')->insert([
            'home_team' => '<h2>Our Team</h2><p>Lorem ipsum dolor sit amet, non odio tincidunt ut ante, lorem a euismod suspendisse vel, sed quam nulla mauris iaculis. Erat eget vitae malesuada, tortor tincidunt porta lorem lectus.</p>'
        ]);

        DB::table('settings')->insert([
            'header_image' => 'front/images/hero_bg.jpg'
        ]);
    }
}
