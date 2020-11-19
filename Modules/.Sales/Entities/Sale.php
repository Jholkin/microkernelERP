<?php

namespace Modules\Sales\Entities;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'customer_id','fecha'
    ];

    public function products()
    {
        return $this->belongsToMany('Modules\Products\Entities\Product')->withPivot('amount','price');
    }

    public function customer()
    {
        return $this->belongsTo('Modules\Customer\Entities\Customer');
    }
}
