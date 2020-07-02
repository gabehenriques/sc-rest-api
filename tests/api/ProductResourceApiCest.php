<?php

use App\User;

use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductResourceApiCest
{
    protected $endpoint = '/api/products';

    public function getAllProducts(ApiTester $I)
    {
        $parm = '';

        $allProducts = $I->getProducts();
        $I->sendGET($this->endpoint . "/" . $parm);
        $I->seeResponseCodeIs(200);
        $I->seeResponseContainsJson($allProducts);
        $I->seeResponseIsJson();
    }

    public function getSingleProducts(ApiTester $I)
    {
        $id = 1;
        $singleProduct = $I->getSingleProducts($id);

        $I->sendGET($this->endpoint . "/" . $id);
        $I->seeResponseCodeIs(200);
        $I->seeResponseContainsJson($singleProduct);
        $I->seeResponseIsJson();
    }

    private function haveProduct(ApiTester $I, $data=[])
    {
        $data = array_merge([
        'name' => 'Example Product 1',
        'category_id' => 1,
        'sku' => 'FCCDEF12345',
        'price' => 99.99,
      ], $data);

        return $I->haveRecord('products', $data);
    }

    public function getProductDataTypes(ApiTester $I)
    {
        $I->sendGET($this->endpoint);
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseMatchesJsonType([
            'id' => 'integer',
            'name' => 'string',
            'sku' => 'string',
            'price' => 'float',
            'category_id' => 'integer',
       ]);
    }
}
