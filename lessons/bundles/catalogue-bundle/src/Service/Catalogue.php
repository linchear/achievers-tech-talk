<?php
/**
 * Created by PhpStorm.
 * User: lin.chear
 * Date: 2018-08-20
 * Time: 11:31 PM
 */

namespace Catalogue\Service;

use \GuzzleHttp;
use Catalogue\Model\Product;

class Catalogue
{
    private $client;
    private $url;

    /**
     * Catalogue constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->client = new GuzzleHttp\Client();
        $this->url = $url;
    }

    /**
     * @param $id
     * @return Product|null
     */
    public function getProduct($id) : ? Product
    {
        $response = $this->client->get($this->url . '/product/' . $id,
            ['headers' => [
                'Content-Type' => 'text/json',
                'host'  => 'localhost'
            ]]
        );

        $body = $response->getBody();

        $productJson = GuzzleHttp\json_decode($body, true);

        $product = new Product();
        $product->name = $productJson['name'];
        $product->id = $productJson['id'];
        $product->description = $productJson['description'];
        $product->price = $productJson['price'];

        return $product;
    }
}