<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['user_id', 'phone', 'address', 'state', 'city', 'zipcode'];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
