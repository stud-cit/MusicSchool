<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'name_department' => 'Відділ боротьби з лінню 1',
            'departments_info' => 'Інформація про відділ',
            'img' => '/img/departments/piano.png',
        ]);
        DB::table('departments')->insert([
            'name_department' => 'Відділ боротьби з лінню 2',
            'departments_info' => 'Інформація про відділ',
            'img' => '/img/departments/skripka.png'
        ]);
        DB::table('departments')->insert([
            'name_department' => 'Відділ боротьби з лінню 3',
            'departments_info' => 'Інформація про відділ',
            'img' => '/img/departments/akkordeon.png'
        ]);
    }
}
