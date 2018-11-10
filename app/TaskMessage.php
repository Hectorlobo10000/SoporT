<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskMessage extends Model
{
    protected $table = 'task_messages';

    /** @var array */
    protected $fillable = [
        'task_id',
        'user_id',
        'content'
    ];

    /** @var array */
    protected $cast = [
        'task_id' => 'int',
        'user_id' => 'int',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function task() {
        return $this->belongsTo('App\Task');
    }
}
