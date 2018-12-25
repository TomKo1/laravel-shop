<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address', 'name', 'payment_id', 'cart', 'user_id'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
