<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'task';
    
    /** @var array */
    protected $fillable = [
        'task_type_id',
        'place_id',
        'user_id',
        'task_state_id',
        'annotation',
    ];

    /** @var array */
    protected $cast = [
        'task_type_id' => 'int',
        'place_id' => 'int',
        'user_id' => 'int',
        'task_state_id' => 'int',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function taskType() {
        return $this->belongsTo('App\TaskType');
    }

    public function place() {
        return $this->belongsTo('App\Place');
    }

    public function taskState() {
        return $this->belongsTo('App\TaskType');
    }

    public function taskMessages() {
        return $this->hasMany('App\TaskMessage');
    }
}
