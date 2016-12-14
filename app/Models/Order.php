<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['client_id', 'user_deleveryman_id', 'total', 'status'];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }


    public function deliveryman()
    {
        return $this->hasOne(User::class);
    }
}
