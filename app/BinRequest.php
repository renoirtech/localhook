<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BinRequest extends Model
{
    use SoftDeletes;
    protected $fillable = [
    'uuid' ,'name', 'method', 'content_type', 'body', 'bin_id'
    ];

    public function bin()
    {
        return $this->belongsTo('App\Bin');
    }
}
