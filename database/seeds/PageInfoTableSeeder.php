<?php

use Illuminate\Database\Seeder;

class PageInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('page_info')->insert([
            'page' => 'home',
            'text' => 'Опис головної сторінки'
        ]);
        DB::table('page_info')->insert([
            'page' => 'history',
            'text' => 'Опис сторінки з історією'
        ]);
        DB::table('page_info')->insert([
            'page' => 'news',
            'text' => 'Опис сторінки з новинами'
        ]);
        DB::table('page_info')->insert([
            'page' => 'departments',
            'text' => 'Опис сторінки з відділами'
        ]);
        DB::table('page_info')->insert([
            'page' => 'achievements',
            'text' => 'Опис сторінки з досягненнями'
        ]);
        DB::table('page_info')->insert([
            'page' => 'introduction',
            'text' => 'Опис сторінки вступу'
        ]);
        DB::table('page_info')->insert([
            'page' => 'gallery',
            'text' => 'Опис сторінки галереї'
        ]);
        DB::table('page_info')->insert([
            'page' => 'contacts',
            'text' => 'Опис сторінки з контактами'
        ]);
        DB::table('page_info')->insert([
            'page' => 'teachers',
            'text' => 'Опис сторінки з викладачами'
        ]);
        DB::table('page_info')->insert([
            'page' => 'instruments',
            'text' => 'Опис сторінки з інструментами'
        ]);
    }
}
