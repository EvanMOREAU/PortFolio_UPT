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
        $rss = simplexml_load_file('http://feeds.feedburner.com/symfony/events');
        $rss_sources = [
            'http://feeds.feedburner.com/symfony/blog',
            'http://feeds.feedburner.com/symfony/events',
            'http://feeds.feedburner.com/knpuniversity',
            'https://www.youtube.com/feeds/videos.xml?channel_id=UCLdVmxwj9dQqM8tJJp2LYGw'
        ];

        $rss_items = [];

        foreach ($rss_sources as $source) {
            $rss = @simplexml_load_file($source);

            if ($rss !== false && isset($rss->channel->item)) {
                foreach ($rss->channel->item as $item) {
                    $rss_items[] = [
                        'title' => (string)$item->title,
                        'link' => (string)$item->link,
                        'description' => (string)$item->description,
                        'pubDate' => (string)$item->pubDate,
                    ];
                }
            }
        }
        dump($rss_items);
        //http://feeds.feedburner.com/symfony/blog
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
            'rss_items' => $rss_items,
        ]);
    }
}
