<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            'title' => 'About',
            'slug' => 'about',
            'description' => '<div class="row"><div class="col-md-5 offset-md-1"><div class="detail-box pr-md-2"><div class="heading_container"><h2 class="">About Us</h2></div><p class="detail_p_mt">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, orThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, orThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or</p><a class="" href="/about"> Read More </a></div></div><div class="col-md-6 px-0"><div class="img-box "><img class="box_img" src="front/images/about-img.jpg" alt="about img"></div></div></div>',
            'status' => 1,
            'image' => 'front/images/about-img.jpg'
        ]);

        DB::table('pages')->insert([
            'title' => 'Service',
            'slug' => 'service',
            'description' => '<div class="heading_container heading_center "><h2 class="">Our Services</h2><p class="col-lg-8 px-0">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything</p></div>',
            'status' => 1,
            'image' => 'front/images/about-img.jpg'
        ]);

        DB::table('pages')->insert([
            'title' => 'Team',
            'slug' => 'team',
            'description' => '<div class="heading_container heading_center"><h2>Our Team</h2><p>Lorem ipsum dolor sit amet, non odio tincidunt ut ante, lorem a euismod suspendisse vel, sed quam nulla mauris&nbsp;iaculis. Erat eget vitae malesuada, tortor tincidunt porta lorem lectus.</p></div>',
            'status' => 1,
            'image' => 'front/images/about-img.jpg'
        ]);

        DB::table('pages')->insert([
            'title' => 'Contact Us',
            'slug' => 'contact-us',
            'description' => '<p>'.Str::random(30).'</p>',
            'status' => 1,
            'image' => 'front/images/about-img.jpg'
        ]);
    }
}
