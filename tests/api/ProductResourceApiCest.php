<?php

class ProductResourceApiCest
{
    protected $endpoint = '/api/products';


    public function getAllProducts(ApiTester $I)
    {
        // $id = (string) $this->havePost($I, ['title' => 'Game of Thrones']);
        // $id2 = (string) $this->havePost($I, ['title' => 'Lord of the Rings']);
        $id = $I->haveRecord('products', $this->getPostAttributes(['name' => 'Sik Sik Wat']));
        $id2 = $I->haveRecord('products', $this->getPostAttributes(['name' => 'Huo Guo']));
        $I->sendGET($this->endpoint);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->expect('both items are in response');
        $I->seeResponseContainsJson(['id' => "$id", 'name' => 'Sik Sik Wat']);
        $I->seeResponseContainsJson(['id' => "$id2", 'name' => 'Huo Guo']);
        $I->seeResponseContainsJson([['id' => $id], ['id' => $id2]]);
    }



    public function _before(ApiTester $I)
    {
    }

    // tests
    public function tryToTest(ApiTester $I)
    {
    }
}
