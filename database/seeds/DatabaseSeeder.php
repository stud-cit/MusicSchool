<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            IntroTableSeeder::class,
            InfoTableSeeder::class,
            DocumentTableSeeder::class,
            NewsAchieveStoryTableSeeder::class,
            // ImagesTableSeeder::class,
            DepartmentsTableSeeder::class,
            TeachersTableSeeder::class,
            InstrumentsTableSeeder::class,
        ]);
    }
}
