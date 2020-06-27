<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();

        $jsonData = File::get("database/data/products.json");

        $data = json_decode($jsonData);

        $products = $data->products;

        foreach ($products as $product) {
            Product::create(array(
              'name' => $product->name,
              'sku' => $product->sku,
              'price' => $product->price,
            ));
        }
    }
}
