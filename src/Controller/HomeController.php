<?php

namespace App\Controller;

use App\Repository\RecipeRepository;
use App\Entity\Recipe;
use App\Entity\User;
use App\Repository\UserRepository;
use DateTime;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'index' )]
    public function index( UserRepository $userRepository )
    {
        $user = $this->getUser();
        $users = $userRepository->findAll();
        if ($user === null) {
            return $this->redirectToRoute('app_login');
         }
         dd($users);
         return $this->render('home/index.html.twig', [
            'users' => $users,
            'user' => $user->getUserIdentifier()
        ]);;
    }


}
