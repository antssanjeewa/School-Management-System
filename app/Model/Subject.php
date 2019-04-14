<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use SoftDeletes;

    protected $fillable = [

    ];

    public function teacher(){
        return $this->belongsTo('App\Model\Teacher');
    }

    public function class_room(){
        return $this->belongsToMany('App\Model\ClassRoom');
    }

    public function marks(){
        return $this->hasMany('App\Model\Marks');
    }
}
