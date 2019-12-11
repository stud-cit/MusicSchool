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
            'teacher_info' => 'Інформація про вчителя1',
            'photo' => '/site-files/teacher_photo.jpg'
        ]);
        DB::table('teachers')->insert([
            'teachers_id' => 2,
            'departments_id' => 2,
            'teacher_surname' => 'Порохова',
            'teacher_name' => 'Валерія',
            'teacher_info' => 'Інформація про вчителя2',
            'photo' => '/site-files/teacher_photo.jpg'
        ]);
        DB::table('teachers')->insert([
            'teachers_id' => 3,
            'departments_id' => 3,
            'teacher_surname' => 'Порохова',
            'teacher_name' => 'Валерія',
            'teacher_info' => 'Інформація про вчителя3',
            'photo' => '/site-files/teacher_photo.jpg'
        ]);
        DB::table('teachers')->insert([
            'teachers_id' => 4,
            'departments_id' => 1,
            'teacher_surname' => 'Порохова',
            'teacher_name' => 'Валерія',
            'teacher_info' => 'Інформація про вчителя4',
            'photo' => '/site-files/teacher_photo.jpg'
        ]);
        DB::table('teachers')->insert([
            'teachers_id' => 5,
            'departments_id' => 3,
            'teacher_surname' => 'Порохова',
            'teacher_name' => 'Валерія',
            'teacher_info' => 'Інформація про вчителя5',
            'photo' => '/site-files/teacher_photo.jpg'
        ]);
        DB::table('teachers')->insert([
            'teachers_id' => 6,
            'departments_id' => 1,
            'teacher_surname' => 'Порохова',
            'teacher_name' => 'Валерія',
            'teacher_info' => 'Інформація про вчителя6',
            'photo' => '/site-files/teacher_photo.jpg'
        ]);
        DB::table('teachers')->insert([
            'teachers_id' => 7,
            'departments_id' => 2,
            'teacher_surname' => 'Порохова',
            'teacher_name' => 'Валерія',
            'teacher_info' => 'Інформація про вчителя7',
            'photo' => '/site-files/teacher_photo.jpg'
        ]);
        DB::table('teachers')->insert([
            'teachers_id' => 8,
            'departments_id' => 3,
            'teacher_surname' => 'Порохова',
            'teacher_name' => 'Валерія',
            'teacher_info' => 'Інформація про вчителя8',
            'photo' => '/site-files/teacher_photo.jpg'
        ]);
        DB::table('teachers')->insert([
            'teachers_id' => 9,
            'departments_id' => 1,
            'teacher_surname' => 'Порохова',
            'teacher_name' => 'Валерія',
            'teacher_info' => 'Інформація про вчителя9',
            'photo' => '/site-files/teacher_photo.jpg'
        ]);
    }
}
