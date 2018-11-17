<?php

use Illuminate\Database\Seeder;

class TaskStatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TaskState::class, 3)->create();
    }
}
