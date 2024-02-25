<?php

namespace App\Controller;

use App\Entity\Recipe;
use App\Form\RecetteType;
use App\Repository\RecipeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function edit( Recipe $recette, Request $request, EntityManagerInterface $em )
    {
        $form = $this->createForm(RecetteType::class, $recette );
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid() )
        {
            $em->flush();
            return $this->redirectToRoute('recette');

        }
        return $this->render('recipe/edit.html.twig', [
            'form' => $form
        ]);

    }

    #[Route('/recette/{id}/delete', name:'recette.delete' ) ]
    public function delete(Recipe $recette, EntityManagerInterface $em  )
    {
        $em->remove($recette);
        $em->flush();
        return $this->redirectToRoute('recette');
    }
}
