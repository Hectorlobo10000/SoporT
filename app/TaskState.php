<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskState extends Model
{
    protected $table = 'tast_states';

    /** @var array */
    protected $fillable = [
        'name',
    ];

    public function tasks() {
        return $this->hasMany('App\Task');
    }
}
