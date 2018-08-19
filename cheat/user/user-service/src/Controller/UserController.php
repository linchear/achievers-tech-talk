<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user/{userId}", name="user", methods={"GET"})
     */
    public function getUserById($userId, EntityManagerInterface $entityManager)
    {
        /** @var User $user */
        $user = $entityManager->getRepository(User::class)
            ->findOneBy([
                'id' => $userId
            ]);

        return $this->json($user->toArray());
    }

    /**
     * @Route("/user", name="add user", methods={"POST"})
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     */
    public function addUser(Request $request, EntityManagerInterface $entityManager)
    {
        $name = $request->get('name');

        $user = new User();
        $user->setName($name);

        $entityManager->persist($user);
        $entityManager->flush();

        return $this->json($user->toArray());
    }
}
