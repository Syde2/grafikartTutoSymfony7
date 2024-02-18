<?php

namespace App\Controller;

use App\Repository\RecipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'recipe.show', )]
    public function index( RecipeRepository $repository )
    {
        $recipes = $repository->findAll();
       return $this->json(['recipes'=> $recipes ]);
    }
}
