<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Environment extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'uuid', 'url', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function redirects()
    {
        return $this->hasMany('App\Redirects');
    }
}
