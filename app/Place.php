<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'places';
    
    /** @var array */
    protected $fillable = [
        'domain',
        'municipality',
        'address',
        'user_id',
    ];

    /** @var array */
    protected $cast = [
        'user_id' => 'int',
    ];

    public function tasks() {
        return $this->hasMany('App\Task');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
