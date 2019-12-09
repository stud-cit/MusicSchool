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
            'departments_id' => 1,
            'name_department' => 'Відділ боротьби з лінню',
            'departments_info' => 'Інформація про відділ',
        ]);
        DB::table('departments')->insert([
            'departments_id' => 2,
            'name_department' => 'Відділ боротьби з лінню',
            'departments_info' => 'Інформація про відділ',
        ]);
        DB::table('departments')->insert([
            'departments_id' => 3,
            'name_department' => 'Відділ боротьби з лінню',
            'departments_info' => 'Інформація про відділ',
        ]);
    }
}
