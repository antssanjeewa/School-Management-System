<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    protected $fillable = [
        'reg_number',
        'name',
        'b_day',
        'gender',
        'address',
        'parent_name',
        'contact_number'
    ];
}
