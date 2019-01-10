<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{

    use Searchable;


     /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'products_index';
    }


     /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    // TODO: override toArray somehow?
    public function toSearchableArray()
    {
        $array = $this->toArray();


        $array['name'] =  $this->name;
        $array['description'] = $this->description;
        $array['brand'] = $this->brand;

        return $array;
    }

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


    /**
     * many to many relation product with category
     */
    public function categories() {
        return $this->belongsToMany('App\Category');
    }
}
