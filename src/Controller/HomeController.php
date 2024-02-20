<?php

namespace App\Controller;

use App\Repository\RecipeRepository;
use App\Entity\Recipe;
use DateTime;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'recipe.show' )]
    public function index( RecipeRepository $repository, EntityManagerInterface $em )
    {
        return $this->render('home/index.html.twig', [
            'controller_name'=>'index'
        ]);

    }
}
