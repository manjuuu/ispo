<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
        'title' => 'Testing Question #1',
        'form_id' => '1',
        'question_type_id' => '1',
        'option_group_id' => '0',
      ]);
        DB::table('questions')->insert([
        'title' => 'Testing Question #2',
        'form_id' => '1',
        'question_type_id' => '3',
        'option_group_id' => '1',
      ]);
    }
}
