<?php

use Illuminate\Database\Seeder;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insert([
            'departments_id' => 1,
            'teacher_surname' => 'Порохова',
            'teacher_name' => 'Валерія',
            'teacher_patronymic' => 'Сергійовна',
            'teacher_info' => 'Інформація про вчителя1',
            'photo' => '/img/empty.png'
        ]);
        DB::table('teachers')->insert([
            'departments_id' => 1,
            'teacher_surname' => 'Порохова',
            'teacher_name' => 'Валерія',
            'teacher_patronymic' => 'Сергійовна',
            'teacher_info' => 'Інформація про вчителя2',
            'photo' => '/img/empty.png'
        ]);
    }
}
