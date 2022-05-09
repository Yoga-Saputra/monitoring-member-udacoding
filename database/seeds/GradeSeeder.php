<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
/*         foreach(range(0,5) as $i ){
            DB::table('grades')->insert([
                'exam'      => rand(80,100),
                'sub_exam'  => rand(90,100),
                'participant_id' => rand(1,3),
                'program_id' => rand(1,3),
                'angkatan_id' => rand(1,3),
                'week_id' => rand(1,3)
            ]);
        } */
    }
}
