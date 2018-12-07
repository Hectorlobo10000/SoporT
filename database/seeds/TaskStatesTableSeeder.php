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
        DB::table('task_states')->insert([
            'name' => 'Pendiente'
        ]);

        DB::table('task_states')->insert([
            'name' => 'Iniciada'
        ]);

        DB::table('task_states')->insert([
            'name' => 'Finalizada'
        ]);

        DB::table('task_states')->insert([
            'name' => 'Verificada'
        ]);
    }
}
