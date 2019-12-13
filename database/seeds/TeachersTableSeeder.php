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
            'teacher_info' => 'Інформація про вчителя1',
            'photo' => '/img/empty.png'
        ]);
        DB::table('teachers')->insert([
            'departments_id' => 1,
            'teacher_surname' => 'Порохова',
            'teacher_name' => 'Валерія',
            'teacher_info' => 'Інформація про вчителя2',
            'photo' => '/img/empty.png'
        ]);
        DB::table('teachers')->insert([
            'departments_id' => 1,
            'teacher_surname' => 'Порохова',
            'teacher_name' => 'Валерія',
            'teacher_info' => 'Інформація про вчителя3',
            'photo' => '/img/empty.png'
        ]);
        DB::table('teachers')->insert([
            'departments_id' => 2,
            'teacher_surname' => 'Порохова',
            'teacher_name' => 'Валерія',
            'teacher_info' => 'Інформація про вчителя4',
            'photo' => '/img/empty.png'
        ]);
        DB::table('teachers')->insert([
            'departments_id' => 2,
            'teacher_surname' => 'Порохова',
            'teacher_name' => 'Валерія',
            'teacher_info' => 'Інформація про вчителя5',
            'photo' => '/img/empty.png'
        ]);
        DB::table('teachers')->insert([
            'departments_id' => 2,
            'teacher_surname' => 'Порохова',
            'teacher_name' => 'Валерія',
            'teacher_info' => 'Інформація про вчителя6',
            'photo' => '/img/empty.png'
        ]);
        DB::table('teachers')->insert([
            'departments_id' => 3,
            'teacher_surname' => 'Порохова',
            'teacher_name' => 'Валерія',
            'teacher_info' => 'Інформація про вчителя7',
            'photo' => '/img/empty.png'
        ]);
        DB::table('teachers')->insert([
            'departments_id' => 3,
            'teacher_surname' => 'Порохова',
            'teacher_name' => 'Валерія',
            'teacher_info' => 'Інформація про вчителя8',
            'photo' => '/img/empty.png'
        ]);
        DB::table('teachers')->insert([
            'departments_id' => 3,
            'teacher_surname' => 'Порохова',
            'teacher_name' => 'Валерія',
            'teacher_info' => 'Інформація про вчителя9',
            'photo' => '/img/empty.png'
        ]);
    }
}
