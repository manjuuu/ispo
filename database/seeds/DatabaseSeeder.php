<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
        $this->call(UserGroupsTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(FormsTableSeeder::class);
        $this->call(QuestionTypesTableSeeder::class);
        $this->call(OptionGroupTableSeeder::class);
        $this->call(OptionsTableSeeder::class);
    }
}
