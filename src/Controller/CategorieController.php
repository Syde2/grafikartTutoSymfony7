<?php
namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\DependencyInjection\Security\UserProvider\EntityFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


#[Route('/categorie', ) ]
class CategorieController extends AbstractController
{
    #[Route('', name:'categorie' )]
    public function index(CategorieRepository $categorieRepository ): Response
    {
        $categories = $categorieRepository->findAll();
        return $this->render('categorie/index.html.twig', [
            'categories' => $categories,
        ]);
    }

    #[Route('/{id}/edit', name: 'categorie.edit')]
    public function edit(Categorie $categorie, EntityManagerInterface $em  ): Response
    {

        return $this->render('categorie/index.html.twig', [
            'categories' => $categorie,
        ]);
    }

    #[Route('/{id}/delete', name: 'categorie.delete')]
    public function delete(Categorie $categorie, EntityManagerInterface $em  ): Response
    {
        $em->remove($categorie);
        $em->flush();
        return $this->redirectToRoute('categorie');

    }


}
