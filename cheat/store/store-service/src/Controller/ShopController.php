<?php

namespace App\Controller;

use Cart\Service\Cart as CartService;
use Catalogue\Service\Catalogue as CatalogueService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Tax\Service\Tax;
use Symfony\Component\HttpFoundation\Request;
use User\Service\User;

class ShopController extends AbstractController
{
    /**
     * @Route("/cart-value/{userId}", name="shop", methods={"GET"})
     * @param Request $request
     * @param $userId
     * @param CatalogueService $catalogueService
     * @param CartService $cartService
     * @param Tax $taxService
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getCartValue(Request $request, $userId, CatalogueService $catalogueService, CartService $cartService, Tax $taxService, User $userService)
    {
        $province = $request->query->get('prov');
        $cart = $cartService->getCart($userId);
        $userModel = $userService->getUser($userId);

        $subTotal = 0;
        $totalTax = 0;
        $taxRate = $taxService->getRate($province);
        foreach ($cart->products as $productId)
        {
            $product = $catalogueService->getProduct($productId);
            $product->price;


            $taxValue = ($product->price * $taxRate);
            $totalTax += $taxValue;
            $subTotal += $product->price;
        }

        return $this->json([
            'name' => $userModel->name,
            'num_products' => count($cart->products),
            'sub_total' => ($subTotal / 100),
            'tax_total' => ($totalTax / 100),
            'total' => (($subTotal + $totalTax) / 100),
            'province' => $province,
            'tax_rate' => $taxRate
        ]);
    }
}
