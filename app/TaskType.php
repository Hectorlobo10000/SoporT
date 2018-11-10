<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskType extends Model
{
    protected $table = 'task_types';

    /** @var array */
    protected $fillable = [
        'name',
    ];

    public function tasks() {
        return $this->hasMany('App\Task');
    }

    public function usersPerTaskTypes() {
        return $this->belongsToMany('App\UserPerTaskType');
    }
}
