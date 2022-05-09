<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Week2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('week2s')->insert([
            'exam_2'      => rand(80,100),
            'sub_exam_2'  => rand(90,100),
            'sub_exam_3'  => rand(90,100),
            'sub_exam_4'  => rand(90,100),
            'participant_id' => '1',
            'program_id' => '2',
            
        ]);
        DB::table('week2s')->insert([
            'exam_2'      => rand(80,100),
            'sub_exam_2'  => rand(90,100),
            'sub_exam_3'  => rand(90,100),
            'sub_exam_4'  => rand(90,100),
            'participant_id' => '1',
            'program_id' => '2',
            
        ]);
        DB::table('week2s')->insert([
            'exam_2'      => rand(80,100),
            'sub_exam_2'  => rand(90,100),
            'sub_exam_3'  => rand(90,100),
            'sub_exam_4'  => rand(90,100),
            'participant_id' => '1',
            'program_id' => '2',
            
        ]);
        DB::table('week2s')->insert([
            'exam_2'      => rand(80,100),
            'sub_exam_2'  => rand(90,100),
            'sub_exam_3'  => rand(90,100),
            'sub_exam_4'  => rand(90,100),
            'participant_id' => '1',
            'program_id' => '2',
            
        ]);

    }
}
