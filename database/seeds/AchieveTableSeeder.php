<?php

use Illuminate\Database\Seeder;

class AchieveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('achieve')->insert([
            'title' => 'test',
            'text' => 'If as increasing contrasted entreaties be. Detract yet delight written farther his general. Now summer who day looked our behind moment coming. Any delicate you how kindness horrible outlived servants. Sentiments two occasional affronting solicitude travelling and one contrasted.',
            'date' => '2019-12-13',
            'photo' => '/img/empty.png'
        ]);
    }
}
