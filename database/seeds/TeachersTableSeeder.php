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
            'teachers_id' => 1,
            'departments_id' => 1,
            'teacher_surname' => 'Порохова',
            'teacher_name' => 'Валерія',
            'teacher_info' => 'Інформація про вчителя',
            'photo' => '/site-files/teacher_photo.jpg'
        ]);
        DB::table('teachers')->insert([
            'teachers_id' => 2,
            'departments_id' => 2,
            'teacher_surname' => 'Порохова',
            'teacher_name' => 'Валерія',
            'teacher_info' => 'Інформація про вчителя',
            'photo' => '/site-files/teacher_photo.jpg'
        ]);
        DB::table('teachers')->insert([
            'teachers_id' => 3,
            'departments_id' => 3,
            'teacher_surname' => 'Порохова',
            'teacher_name' => 'Валерія',
            'teacher_info' => 'Інформація про вчителя',
            'photo' => '/site-files/teacher_photo.jpg'
        ]);
    }
}
