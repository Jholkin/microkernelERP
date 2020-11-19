<?php

namespace Modules\Products\Entities;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','brand','unit_price','stock','provider'
    ];

    public function sales()
    {
        return $this->belongsToMany('Modules\Sales\Entities\Sale');
    }
}
