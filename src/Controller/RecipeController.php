<?php

namespace App\Controller;

use App\Form\RecetteType;
use App\Repository\RecipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RecipeController extends AbstractController
{
    #[Route('/recette', name: 'recette')]
    public function index( RecipeRepository $recipeRepository ): Response
    {
        $recipes = $recipeRepository->findAll();
        return $this->render('recipe/index.html.twig', [
            'controller_name' => 'RecipeController',
            'recipes' => $recipes,
        ]);
    }

    #[Route('/recette/{id}/edit', name:'recette.edit' ) ]
    public function edit( $id, RecipeRepository $recipeRepository  )
    {
        $recette = $recipeRepository->find($id);
        $form = $this->createForm(RecetteType::class, $recette );
        return $this->render('recipe/edit.html.twig', [
            'form' => $form
        ]);

    }
    #[Route('/recette/delete', name:'recette.delete' ) ]
    public function delete()
    {
        return $this->json(['recette'=>'recette' ] );

    }
}
