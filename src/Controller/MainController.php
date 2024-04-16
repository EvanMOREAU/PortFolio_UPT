<?php

namespace App\Controller;

use App\Repository\DocumentationsRepository;
use App\Repository\DocumentCategoryRepository;
use App\Repository\HappyClientsRepository;
use App\Repository\HoursWorkedRepository;
use App\Repository\SkillsRepository;
use App\Repository\ProjectRepository;
use App\Repository\StudiesRepository;
use App\Repository\LanguagesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(StudiesRepository $studiesRepository, ProjectRepository $projectRepository, SkillsRepository $skillsRepository, LanguagesRepository $languagesRepository, HoursWorkedRepository $hoursWorkedRepository, HappyClientsRepository $happyClientRepository, DocumentCategoryRepository $documentCategoryRepository, DocumentationsRepository $documentationsRepository): Response
    {
        $fullUrl = $_SERVER['REQUEST_URI'];
        
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'url'             => $fullUrl,
            'studies' => $studiesRepository->findAll(),
            'projects' => $projectRepository->findAll(),
            'documentationcategorys' => $documentCategoryRepository->findAll(),
            'documentations' => $documentationsRepository->findAll(),
            'skills' => $skillsRepository->findAll(),
            'languages' => $languagesRepository->findAll(),
            'hour' => $hoursWorkedRepository->findOneBy(array(), array('id' => 'ASC')),
            'happy' => $happyClientRepository->findOneBy(array(), array('id' => 'ASC')),
        ]);
    }
}
