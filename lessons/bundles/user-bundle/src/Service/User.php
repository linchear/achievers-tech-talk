<?php
/**
 * Created by PhpStorm.
 * User: lin.chear
 * Date: 2018-08-21
 * Time: 12:18 PM
 */

namespace User\Service;

use User\Model\User as UserModel;
use \GuzzleHttp;

class User
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

    public function getUser($userId)
    {
        $response = $this->client->get(
          $this->url . '/user/' . $userId,
            ['headers' => [
                'Content-Type' => 'text/json',
                'host'  => 'localhost'
            ]]
        );

        $body = $response->getBody();

        $userJson = GuzzleHttp\json_decode($body, true);

        $userModel = new UserModel();
        $userModel->id = $userJson['id'];
        $userModel->name = $userJson['name'];

        return $userModel;
    }

    public function addUser(UserModel $user)
    {
        $response = $this->client->post(
            $this->url . '/user',
            ['headers' => [
                'Content-Type' => 'text/json',
                'host'  => 'localhost'
            ],
                GuzzleHttp\RequestOptions::JSON => [
                    'name' => $user->name
                ]]
        );

        $body = $response->getBody();

        $userJson = GuzzleHttp\json_decode($body, true);

        $userModel = new UserModel();
        $userModel->id = $userJson['id'];
        $userModel->name = $userJson['name'];

        return $userModel;
    }
}