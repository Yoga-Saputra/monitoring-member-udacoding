<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimoniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('testimoni')->insert([
            'participant_id' => 6,
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum saepe laudantium blanditiis accusantium, numquam porro doloribus quibusdam at officia cumque quis consectetur assumenda odit praesentium odio expedita harum optio commodi obcaecati aperiam iure molestiae sed eligendi? Accusantium, voluptatibus distinctio eveniet minima obcaecati iusto quis eius libero aut quaerat error debitis?',
        ]);
        DB::table('testimoni')->insert([
            'participant_id' => 6,
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum saepe laudantium blanditiis accusantium, numquam porro doloribus quibusdam at officia cumque quis consectetur assumenda odit praesentium odio expedita harum optio commodi obcaecati aperiam iure molestiae sed eligendi? Accusantium, voluptatibus distinctio eveniet minima obcaecati iusto quis eius libero aut quaerat error debitis?',
        ]);
        DB::table('testimoni')->insert([
            'participant_id' => 6,
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum saepe laudantium blanditiis accusantium, numquam porro doloribus quibusdam at officia cumque quis consectetur assumenda odit praesentium odio expedita harum optio commodi obcaecati aperiam iure molestiae sed eligendi? Accusantium, voluptatibus distinctio eveniet minima obcaecati iusto quis eius libero aut quaerat error debitis?',
        ]);
    }
}
