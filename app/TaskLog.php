<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskLog extends Model
{
   protected $casts = [
		'task_id' => 'int',
		'task_state_id' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'task_id',
		'task_state_id',
		'user_id'
	];

	public function task()
	{
		return $this->belongsTo(\App\Task::class)->withTrashed();
	}

	public function task_state()
	{
		return $this->belongsTo(\App\TaskState::class);
	}
	public function user()
	{
		return $this->belongsTo(\App\User::class);
	}
}
