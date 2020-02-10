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
            NewsStoryTableSeeder::class,
            AchieveTableSeeder::class,
            DepartmentsTableSeeder::class,
            TeachersTableSeeder::class,
            InstrumentsTableSeeder::class,
            UsersTableSeeder::class,
            PageInfoTableSeeder::class,
            SiteInfoTableSeeder::class,
        ]);
    }
}
