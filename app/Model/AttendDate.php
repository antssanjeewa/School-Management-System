<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttendDate extends Model
{
    use SoftDeletes;
    
    protected $fillable = [

    ];

    public function children(){
        return $this->belongsToMany('App\Model\Children');
    }
}
