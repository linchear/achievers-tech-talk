<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends AbstractController
{
    /**
     * @Route("/product/{id}", name="product", methods={"GET"})
     * @param $id
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function getProduct($id, EntityManagerInterface $entityManager)
    {
        /** @var Product $product */
        $product = $entityManager->getRepository(Product::class)
            ->findOneBy([
                'id' => $id
            ]);

        return $this->json($product->toArray());
    }

    /**
     * @Route("/product", name="add product", methods={"POST"})
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function addProduct(Request $request, EntityManagerInterface $entityManager)
    {
        $name = $request->get('name');
        $price = $request->get('price');
        $desc = $request->get('desc');

        $product = new Product();
        $product->setName($name);
        $product->setDescription($desc);
        $product->setPrice($price);

        $entityManager->persist($product);
        $entityManager->flush();

        return $this->json($product->getId());
    }
}
