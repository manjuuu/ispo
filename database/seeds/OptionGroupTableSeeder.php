<?php

use Illuminate\Database\Seeder;

class OptionGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('option_groups')->insert([
      'title' => 'Testing Option Group',
      'group_id' => '1',
    ]);
    }
}
