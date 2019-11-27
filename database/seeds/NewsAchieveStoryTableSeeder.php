<?php

use Illuminate\Database\Seeder;

class NewsAchieveStoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_achieve_story')->insert([
            'nas_id' => 1,
            'title' => 'Новина',
            'text' => 'Інформація про новину',
            'date' => '1997-05-31',
            'type' => 'news',
        ]);
        DB::table('news_achieve_story')->insert([
            'nas_id' => 2,
            'title' => 'Перемога у конкурсі',
            'text' => 'Інформація про досягнення',
            'date' => '1998-05-21',
            'type' => 'achieve',
        ]);
        DB::table('news_achieve_story')->insert([
            'nas_id' => 3,
            'title' => 'Новий відділ',
            'text' => 'Інформація про історію',
            'date' => '1999-07-11',
            'type' => 'story',
        ]);
    }
}
