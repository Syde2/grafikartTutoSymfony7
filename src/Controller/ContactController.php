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
        return $this->json([ 'key'=>'value' ] );

    }
}
