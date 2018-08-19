<?php
/**
 * Created by PhpStorm.
 * User: lin.chear
 * Date: 2018-08-21
 * Time: 9:12 AM
 */

namespace Cart\Service;

use \GuzzleHttp;
use Cart\Model\Cart as CartModel;

class Cart
{

    /**
     * @var GuzzleHttp\Client
     */
    private $client;

    /** @var string */
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
     * @param $userId
     * @return CartModel
     */
    public function getCart($userId)
    {
        $response = $this->client->get($this->url . '/cart/' . $userId,
            ['headers' => [
                'Content-Type' => 'text/json',
                'host'  => 'localhost'
            ]]
        );

        $body = $response->getBody();

        $cartJson = GuzzleHttp\json_decode($body, true);

        $cart = new CartModel();
        $cart->id = $cartJson['id'];
        $cart->userId = $cartJson['userId'];
        $cart->products = $cartJson['products'];

        return $cart;
    }

    /**
     * @param $userId
     * @param $productId
     * @return CartModel
     */
    public function addToCart($userId, $productId)
    {
        $response = $this->client->post($this->url . '/cart',
            ['headers' => [
                'Content-Type' => 'text/json',
                'host'  => 'localhost'
            ],
                GuzzleHttp\RequestOptions::JSON => [
                    'userId' => $userId,
                    'productId' => $productId
                ]
            ]
        );

        $body = $response->getBody();

        $cartJson = GuzzleHttp\json_decode($body, true);

        $cart = new CartModel();
        $cart->id = $cartJson['id'];
        $cart->userId = $cartJson['userId'];
        $cart->products = $cartJson['products'];

        return $cart;
    }
}