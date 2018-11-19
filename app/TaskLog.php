<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskLog extends Model
{
   protected $casts = [
		'task_id' => 'int',
		'task_state_id' => 'int'
	];

	protected $fillable = [
		'task_id',
		'task_state_id'
	];

	public function task()
	{
		return $this->belongsTo(\App\Task::class);
	}

	public function task_state()
	{
		return $this->belongsTo(\App\TaskState::class);
	}
}
