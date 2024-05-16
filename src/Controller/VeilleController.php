<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class VeilleController extends AbstractController
{
    #[Route('/veille', name: 'app_veille')]
    public function index(): Response
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

        return $this->render('veille/index.html.twig', [
            'controller_name' => 'VeilleController',
            'rss_items' => $rss_items,
        ]);
    }
}
