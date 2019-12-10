<?php

use Illuminate\Database\Seeder;

class DocumentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('documents')->insert([
            'documents_id' => 1,
            'text' => 'Заголовок першого документу',
            'file' => '/documents/document1'
        ]);
        DB::table('documents')->insert([
            'documents_id' => 2,
            'text' => 'Заголовок другого документу',
            'file' => '/documents/document2'
        ]);
        DB::table('documents')->insert([
            'documents_id' => 3,
            'text' => 'Заголовок третього документу',
            'file' => '/documents/document3'
        ]);
        DB::table('documents')->insert([
            'documents_id' => 4,
            'text' => 'Заголовок четвертого документу',
            'file' => '/documents/document4'
        ]);
        DB::table('documents')->insert([
            'documents_id' => 5,
            'text' => 'Заголовок п’ятого документу',
            'file' => '/documents/document5'
        ]);
    }
}
