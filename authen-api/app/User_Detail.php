<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class User_Detail extends Model
{
    protected $fillable = ['user_id','name'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
