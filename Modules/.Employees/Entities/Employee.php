<?php

namespace Modules\Employees\Entities;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name','lastname','email','phone','address','birthday'
    ];
}
