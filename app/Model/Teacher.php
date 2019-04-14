<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;
    
    protected $fillable = [

    ];

    public function subject(){
        return $this->hasMany('App\Model\Subject');
    }

    public function marks(){
        return $this->hasMany('App\Model\Marks');
    }
}
