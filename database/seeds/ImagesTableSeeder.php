<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            'images_id' => 1,
            'nas_id' => 1,
            'file' => '/site-files/photo_news.png'
        ]);
        DB::table('images')->insert([
            'images_id' => 2,
            'nas_id' => 2,
            'file' => '/site-files/photo_achieve.png'
        ]);
        DB::table('images')->insert([
            'images_id' => 3,
            'nas_id' => 3,
            'file' => '/site-files/photo_story.png'
        ]);
    }
}
