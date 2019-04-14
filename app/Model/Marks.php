<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Marks extends Model
{
    use SoftDeletes;
    
    protected $fillable = [

    ];

    public function children(){
        return $this->belongsTo('App\Model\Children');
    }

    public function teacher(){
        return $this->belongsTo('App\Model\Teacher');
    }

    public function subject(){
        return $this->belongsTo('App\Model\Subject');
    }

    public function class_room(){
        return $this->belongsTo('App\Model\ClassRoom');
    }
}
