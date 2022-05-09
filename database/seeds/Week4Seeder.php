<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Week4Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('week4s')->insert([
            'exam_4'      => rand(80,100),
            'sub_exam_8'  => rand(90,100),
            'sub_exam_9'  => rand(90,100),
            'sub_exam_10'  => rand(90,100),
            'sub_exam_11'  => rand(90,100),
            'sub_exam_12'  => rand(90,100),
            'participant_id' => rand(1,3),
            'program_id' => rand(1,3),
            /* 'angkatan_id' => rand(1,3), */
        ]);
    }
}
