<?php
/**
 * Created by PhpStorm.
 * User: lin.chear
 * Date: 2018-08-21
 * Time: 12:18 PM
 */

namespace User\Model;


class User
{
    public $id;
    public $name;

    public function toArray()
    {
        return [
          'id' => $this->id,
          'name' => $this->name
        ];
    }
}