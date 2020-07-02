<?php
namespace Helper;

use App\Product;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Api extends \Codeception\Module
{
    public function getProducts()
    {
        return Product::all()->toArray();
    }


    public function getSingleProducts($id)
    {
        return Product::find($id)->toArray();
    }
}
