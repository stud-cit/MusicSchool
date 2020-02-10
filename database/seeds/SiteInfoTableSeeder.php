<?php

use Illuminate\Database\Seeder;

class SiteInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_info')->insert([
            'site' => 'school',
            'text' => 'Опис школи'
        ]);
        DB::table('site_info')->insert([
            'site' => 'fest',
            'text' => 'Опис фестивалю'
        ]);
    }
}
