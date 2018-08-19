<?php
/**
 * Created by PhpStorm.
 * User: lin.chear
 * Date: 2018-08-20
 * Time: 11:32 PM
 */

namespace Catalogue\Model;


class Product
{
    public $id;
    public $name;
    public $description;
    public $price;

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price
        ];
    }
}