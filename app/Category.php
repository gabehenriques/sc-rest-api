<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'description'];


    /**
     * Get products.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
