<?php

namespace App\Controller;

use App\Form\MailType;
use App\DTO\ContactDTO;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(): Response
    {
        $dto = new ContactDTO();
        $form = $this->createForm(MailType::class, $dto  );
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'form' => $form
        ]);
    }
}
