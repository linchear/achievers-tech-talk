<?php

namespace App\Controller;

use Cart\Model\Cart;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class CartController extends AbstractController
{
    /**
     * @Route("/cart/{userId}", name="cart", methods={"GET"})
     */
    public function getCart($userId, \App\Service\Cart $cartService)
    {
        $cart = $cartService->getCart($userId);
        if (empty($cart)) {
            return $this->json([]);
        }

        return $this->json($cart->toArray());
    }

    /**
     *  @Route("/cart", name="add to cart", methods={"POST"})
     * @param Request $request
     * @param \App\Service\Cart $cartService
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function addProduct(Request $request, \App\Service\Cart $cartService)
    {
        $userId = $request->get('userId');
        $productId = $request->get('productId');

        $cart = $cartService->addProductToCart($userId, $productId);

        return $this->json($cart->toArray());
    }
}
