<?php

use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('options')->insert([
          'title' => 'Test Option 1',
          'option_group_id' => '1',
        ]);
        DB::table('options')->insert([
          'title' => 'Test Option 2',
          'option_group_id' => '1',
        ]);
    }
}
