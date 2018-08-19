<?php
/**
 * Created by PhpStorm.
 * User: lin.chear
 * Date: 2018-08-20
 * Time: 11:04 PM
 */

namespace App\Service;

use App\Entity\Cart as CartEntity;
use Doctrine\ORM\EntityManagerInterface;

class Cart
{
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function getCart($userId) : ?CartEntity
    {
        /** @var CartEntity|null $cart */
        $cart = $this->em->getRepository(CartEntity::class)
            ->findOneBy(['userId' => $userId]);

        return $cart;
    }

    public function addProductToCart($userId, $productId)
    {
        /** @var CartEntity $cart */
        $cart = $this->getCart($userId);
        if (!empty($cart)) {
            $productList = $cart->getProducts();
            $productList[] = $productId;

            $cart->setProducts($productList);
            $this->em->persist($cart);
            $this->em->flush();

            return $cart;
        }

        $cart = new CartEntity();
        $cart->setUserId($userId);
        $cart->setProducts([$productId]);

        $this->em->persist($cart);
        $this->em->flush();

        return $cart;
    }
}