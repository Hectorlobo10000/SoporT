<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPerTaskType extends Model
{
    protected $table = 'users_per_task_types';

    /** @var array */
    protected $fillable = [
        'task_type_id',
        'user_id',
    ];

    /** @var array */
    protected $cast = [
        'task_type_id' => 'int',
        'user_id' => 'int',
    ];

    public function taskTypes() {
        return $this->belongsToMany('App\TaskType');
    }

    public function users() {
        return $this->belongsToMany('App\User');
    }
}
