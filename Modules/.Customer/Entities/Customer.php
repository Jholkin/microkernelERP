<?php

namespace Modules\Customer\Entities;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name','lastname','email','phone','address','birthday'
    ];

    public function sales()
    {
        return $this->hasMany('Modules\Sales\Entities\Sale');
    }
}
