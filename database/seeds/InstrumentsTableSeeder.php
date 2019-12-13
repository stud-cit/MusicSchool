<?php

use Illuminate\Database\Seeder;

class InstrumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instruments')->insert([
            'instruments_id' => 1,
            'departments_id' => 1,
            'name_instruments' => 'Баян',
            'instruments_info' => 'Інформація про інструмент',
            'photo' => '/site-files/instruments.png'
        ]);
        DB::table('instruments')->insert([
            'instruments_id' => 2,
            'departments_id' => 1,
            'name_instruments' => 'Баян',
            'instruments_info' => 'Інформація про інструмент',
            'photo' => '/site-files/instruments.png'
        ]);
        DB::table('instruments')->insert([
            'instruments_id' => 3,
            'departments_id' => 2,
            'name_instruments' => 'Рояль',
            'instruments_info' => 'Інформація про інструмент',
            'photo' => '/site-files/instruments.png'
        ]);
        DB::table('instruments')->insert([
            'instruments_id' => 4,
            'departments_id' => 2,
            'name_instruments' => 'Рояль',
            'instruments_info' => 'Інформація про інструмент',
            'photo' => '/site-files/instruments.png'
        ]);
        DB::table('instruments')->insert([
            'instruments_id' => 5,
            'departments_id' => 3,
            'name_instruments' => 'Гітара',
            'instruments_info' => 'Інформація про інструмент',
            'photo' => '/site-files/instruments.png'
        ]);
        DB::table('instruments')->insert([
            'instruments_id' => 6,
            'departments_id' => 3,
            'name_instruments' => 'Гітара',
            'instruments_info' => 'Інформація про інструмент',
            'photo' => '/site-files/instruments.png'
        ]);
    }
}
