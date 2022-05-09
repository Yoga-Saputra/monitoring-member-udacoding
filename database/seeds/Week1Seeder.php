<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Week1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('week1s')->insert([
            'exam_1'      => rand(80,100),
            'sub_exam_1'  => rand(90,100),
            'participant_id' => '1',
            'program_id' => '1',
/*             'angkatan_id' => '2', */
        ]);
        DB::table('week1s')->insert([
            'exam_1'      => rand(80,100),
            'sub_exam_1'  => rand(90,100),
            'participant_id' => '1',
            'program_id' => '1',
/*             'angkatan_id' => '2', */
        ]);
        DB::table('week1s')->insert([
            'exam_1'      => rand(80,100),
            'sub_exam_1'  => rand(90,100),
            'participant_id' => '2',
            'program_id' => '1',
/*             'angkatan_id' => '1', */
        ]);
        DB::table('week1s')->insert([
            'exam_1'      => rand(80,100),
            'sub_exam_1'  => rand(90,100),
            'participant_id' => '3',
            'program_id' => '1',
/*             'angkatan_id' => '3', */
        ]);
    }
}
