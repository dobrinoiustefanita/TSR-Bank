<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at','updated_at'];

    public function from_user()
    {
        return $this->belongsToMany('App\User','feedback_fromuser');
    }
    public function to_user()
    {
        return $this->belongsToMany('App\User','feedback_touser');
    }
}
