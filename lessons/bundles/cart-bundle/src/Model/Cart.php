<?php
/**
 * Created by PhpStorm.
 * User: lin.chear
 * Date: 2018-08-21
 * Time: 9:19 AM
 */

namespace Cart\Model;


class Cart
{
    public $id;
    public $userId;
    public $products;

    public function toArray()
    {
        return [
            'id' => $this->id,
            'userId' => $this->userId,
            'products' => $this->products
        ];
    }
}