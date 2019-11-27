<?php

use Illuminate\Database\Seeder;

class IntroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('intro')->insert([
            'block1' => 'перший блок з інформацією про вступ',
            'block2' => 'другий блок з інформацією про вступ',
            'block3' => 'третій блок з інформацією про вступ',
            'bg' => '/site-files/intro_bg.jpg',
            'info' => 'інформація про вступ',
            'photo' => '/site-files/intro_photo.jpg'
        ]);
    }
}
