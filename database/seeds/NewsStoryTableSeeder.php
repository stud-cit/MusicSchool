<?php

use Illuminate\Database\Seeder;

class NewsStoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_story')->insert([
            'title' => 'Новина',
            'text' => 'Інформація про новину',
            'date' => '1997-05-31',
            'type' => 'news',
        ]);
        DB::table('news_story')->insert([
            'title' => 'Новий відділ',
            'text' => 'Інформація про історію',
            'date' => '1999-07-11',
            'type' => 'story',
        ]);
    }
}
