<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'image'
    ];




    /**
     * Many to many relation product - category
     */
    public function products() {
        return $this->belongsToMany('App\Product');
    }

}
