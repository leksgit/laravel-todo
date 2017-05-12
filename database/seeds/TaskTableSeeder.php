<?php

use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task')->insert([
            'name' => 'First Task',
            'descriptions' => 'Long description for the first task',
            'priority' => '1',
            'user_id' => '1',
            'status' => '1',
        ]);
        DB::table('task')->insert([
            'name' => 'Secondary Task',
            'descriptions' => 'Long description for the secondary task',
            'priority' => '1',
            'user_id' => '1',
            'status' => '1',
        ]);

    }
}
