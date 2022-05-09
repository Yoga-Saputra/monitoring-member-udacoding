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
        // $this->call(RolesTableSeeder::class);
        $this->call(ProgramSeeder::class);
        // $this->call(ParticipantSeeder::class);
        // $this->call(TestimoniSeeder::class);
        // $this->call(Week1Seeder::class);
        $this->call(UserSeeder::class);
        // $this->call(AngkatanSeeder::class);
        // $this->call(ProgramSeeder::class);
        // $this->call(GradeSeeder::class);
        // $this->call(Week1Seeder::class);
        // $this->call(Week2Seeder::class);
        // $this->call(Week3Seeder::class);
        // $this->call(Week4Seeder::class);
    }
}
