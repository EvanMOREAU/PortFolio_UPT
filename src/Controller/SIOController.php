<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SIOController extends AbstractController
{
    #[Route('/sio', name: 'app_sio')]
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');
        
        return $this->render('sio/index.html.twig', [
            'controller_name' => 'SIOController',
        ]);
    }
}
