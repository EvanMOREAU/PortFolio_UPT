<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VeilleController extends AbstractController
{
    #[Route('/veille', name: 'app_veille')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
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

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($contact);
            $entityManager->flush();

            return $this->redirectToRoute('app_main', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('veille/index.html.twig', [
            'controller_name' => 'VeilleController',
            'rss_items' => $rss_items,
        ]);
    }
}
