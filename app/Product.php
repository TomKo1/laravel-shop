<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'price', 'brand', 'quantity', 'name', 'images'
    ];

    /**
     * To cast json from db to array
     * https://stackoverflow.com/questions/32954424/laravel-migration-array-type-store-array-in-database-column/32955501#32955501
     */
    protected $casts = [
        'images' => 'array'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'name', 'description', 'price', 'brand', 'quantity', 'images'
    ];
}
