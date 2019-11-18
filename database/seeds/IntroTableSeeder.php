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
            'block1' => '',
            'block2' => '',
            'block3' => '',
            'bg' => '/img/intro_bg.jpg',
            'info' => 'заохочувальна інформація в категорії про вступ',
            'photo' => ''
        ]);
    }
}
