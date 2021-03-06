<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'street', 'zip_code', 'city', 'user_id'
    ];


    public function __toString() {
        return  $this->street.' '.$this->zip_close.' '.$this->city;
    }


}
