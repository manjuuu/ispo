<?php

use Illuminate\Database\Seeder;

class QuestionTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('question_types')->insert(['title' => 'Textbox', 'type' => 'text']);
        DB::table('question_types')->insert(['title' => 'Textarea', 'type' => 'textarea']);
        DB::table('question_types')->insert(['title' => 'Select / Dropdown', 'type' => 'select', 'uses_option_groups' => true]);
        DB::table('question_types')->insert(['title' => 'Radio Button', 'type' => 'radio', 'uses_option_groups' => true]);
        DB::table('question_types')->insert(['title' => 'Checkbox', 'type' => 'check', 'uses_option_groups' => true]);
        DB::table('question_types')->insert(['title' => 'Date', 'type' => 'date']);
        DB::table('question_types')->insert(['title' => 'Time', 'type' => 'time']);
        DB::table('question_types')->insert(['title' => 'Money (#####.##)', 'type' => 'money']);
        DB::table('question_types')->insert(['title' => 'Numeric', 'type' => 'numeric']);
        DB::table('question_types')->insert(['title' => 'Integer', 'type' => 'integer']);
        DB::table('question_types')->insert(['title' => 'Hidden String', 'type' => 'password']);
        DB::table('question_types')->insert(['title' => 'Dependant Select', 'type' => 'selectdependant', 'uses_option_groups' => true]);
    }
}
