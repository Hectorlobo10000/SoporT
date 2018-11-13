<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 08 Nov 2018 16:41:24 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Task
 *
 * @property int $id
 * @property int $task_type_id
 * @property int $place_id
 * @property int $user_id
 * @property int $task_state_id
 * @property string $annotation
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \App\Place $place
 * @property \App\TaskState $task_state
 * @property \App\TaskType $task_type
 * @property \App\User $user
 * @property \Illuminate\Database\Eloquent\Collection $task_messages
 *
 * @package App
 */
class Task extends Model
{
	protected $casts = [
		'task_type_id' => 'int',
		'technician_id' => 'int',
		'client_id' => 'int',
		'task_state_id' => 'int'
	];

	protected $fillable = [
		'task_type_id',
		'technician_id',
		'client_id',
		'task_state_id',
		'description',
		'annotation'
	];

	public function task_state()
	{
		return $this->belongsTo(\App\TaskState::class);
	}

	public function task_type()
	{
		return $this->belongsTo(\App\TaskType::class);
	}

	public function technician()
	{
		return $this->belongsTo(\App\User::class);
	}
	public function client()
	{
		return $this->belongsTo(\App\User::class);
	}

	public function task_messages()
	{
		return $this->hasMany(\App\TaskMessage::class);
	}
}