<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Many to many relation product - category
     */
    public function products() {
        return $this->belongsToMant('Address\Product');
    }

}
