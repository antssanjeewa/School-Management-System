<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Children extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'reg_number',
        'name',
        'b_day',
        'gender',
        'address',
        'parent_name',
        'contact_number'
    ];

    public function attend_date(){
        return $this->belongsToMany('App\Model\AttendDate');
    }

    public function class_room(){
        return $this->belongsToMany('App\Model\ClassRoom');
    }

    public function marks(){
        return $this->hasMany('App\Model\Marks');
    }
}
