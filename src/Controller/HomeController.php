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
        dd($repository->getTotalTime());
        $recipes =  $em->getRepository(Recipe::class)->findAll();
        $repo =  $em->getRepository(Recipe::class);
        $recipe = new Recipe();
        $recipe
        ->setTitle("barbe a Papa")
        ->setSlug('barbe-papa')
        ->setContent('mettez du Sucre')
        ->setDuration(2)
        ->setCreatedAt(new DateTimeImmutable())
        ->setUpdatedAt(new DateTimeImmutable());

        $em->persist($recipe);
        $em->flush();

       return $this->json(['recipes'=> $recipes ]);
    }
}
