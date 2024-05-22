<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class InfoLegalesController extends AbstractController
{
    #[Route('/info-legales', name: 'app_info_legales')]
    public function index(): Response
    {
        return $this->render('info_legales/index.html.twig', [
            'controller_name' => 'InfoLegalesController',
        ]);
    }
}
