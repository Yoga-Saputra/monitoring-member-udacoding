<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Week3Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('week3s')->insert([
            'exam_3'      => rand(80,100),
            'sub_exam_5'  => rand(90,100),
            'sub_exam_6'  => rand(90,100),
            'sub_exam_7'  => rand(90,100),
            'participant_id' => rand(1,3),
            'program_id' => rand(1,3),
            /* 'angkatan_id' => rand(1,3), */
        ]);
    }
}
