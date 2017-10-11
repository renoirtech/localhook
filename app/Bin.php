<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bin extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'uuid', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function requests()
    {
        return $this->hasMany('App\BinRequest');
    }
}
