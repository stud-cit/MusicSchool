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
            'title' => 'Сумська Музича школа №2',
            'shirt_text' => 'Опис головної сторінки'
        ]);
        DB::table('page_info')->insert([
            'page' => 'history',
            'title' => 'Дивовижна історія школи',
            'shirt_text' => 'Опис сторінки з історією'
        ]);
        DB::table('page_info')->insert([
            'page' => 'news',
            'title' => 'Актуальні новини',
            'shirt_text' => 'Опис сторінки з новинами'
        ]);
        DB::table('page_info')->insert([
            'page' => 'departments',
            'title' => 'Різноманітність відділів',
            'shirt_text' => 'Опис сторінки з досягненнями'
        ]);
        DB::table('page_info')->insert([
            'page' => 'achievements',
            'title' => 'Важливі досягнення',
            'shirt_text' => 'Опис сторінки з досягненнями'
        ]);
        DB::table('page_info')->insert([
            'page' => 'introduction',
            'title' => 'Інформація про вступ',
            'shirt_text' => 'Опис сторінки вступу'
        ]);
        DB::table('page_info')->insert([
            'page' => 'gallery',
            'title' => 'Різноманітність галерея',
            'shirt_text' => 'Опис сторінки галереї'
        ]);
        DB::table('page_info')->insert([
            'page' => 'contacts',
            'title' => 'Доступні контакти',
            'shirt_text' => 'Опис сторінки з контактами'
        ]);
        DB::table('page_info')->insert([
            'page' => 'teachers',
            'title' => 'Найкращі викладачі',
            'shirt_text' => 'Опис сторінки з викладачами'
        ]);
        DB::table('page_info')->insert([
            'page' => 'instruments',
            'title' => 'Різноманітність інструментів',
            'shirt_text' => 'Опис сторінки з інструментами'
        ]);
    }
}
