<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassRoom extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name'
    ];

    public function children(){
        return $this->belongsToMany('App\Model\Children');
    }

    public function subject(){
        return $this->belongsToMany('App\Model\Subject');
    }

    public function marks(){
        return $this->hasMany('App\Model\Marks');
    }
}
