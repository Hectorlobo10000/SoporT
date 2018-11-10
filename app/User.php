<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /** @var array */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role_id',
        'department_id',
    ];

    /** @var array */
    protected $cast = [
        'role_id' => 'int',
        'department_id' => 'int', 
    ];

    /** @var array */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function role() {
        return $this->belongsTo('App\Role');
    }

    public function department() {
        return $this->belongsTo('App\Department');
    }

    public function taskMessages() {
        return $this->hasMany('App\TaskMessage');
    }

    public function tasks() {
        return $this->hasMany('App\Task');
    }

    public function place() {
        return $this->hasOne('App\Place');
    }

    public function usersPerTaskTypes() {
        return $this->belongsToMany('App\UserPerTaskType');
    }

    public function getRoleIdAttribute($value) {
        return $value;
    }
}
