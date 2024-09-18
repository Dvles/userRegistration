<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AcceuilController extends AbstractController
{
    // Route '/' to setup as homepage    
    #[Route('/', name: 'acceuil')]
    public function index(): Response
    {
        return $this->render('acceuil/index.html.twig');
    }
}
