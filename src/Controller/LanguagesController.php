<?php

namespace App\Controller;

use App\Entity\Languages;
use App\Form\LanguagesType;
use App\Repository\LanguagesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/languages')]
class LanguagesController extends AbstractController
{
    #[Route('/', name: 'app_languages_index', methods: ['GET'])]
    public function index(LanguagesRepository $languagesRepository): Response
    {        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');

        return $this->render('languages/index.html.twig', [
            'languages' => $languagesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_languages_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');

        $language = new Languages();
        $form = $this->createForm(LanguagesType::class, $language);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($language);
            $entityManager->flush();

            return $this->redirectToRoute('app_languages_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('languages/new.html.twig', [
            'language' => $language,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_languages_show', methods: ['GET'])]
    public function show(Languages $language): Response
    {        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');

        return $this->render('languages/show.html.twig', [
            'language' => $language,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_languages_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Languages $language, EntityManagerInterface $entityManager): Response
    {        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');

        $form = $this->createForm(LanguagesType::class, $language);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_languages_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('languages/edit.html.twig', [
            'language' => $language,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_languages_delete', methods: ['POST'])]
    public function delete(Request $request, Languages $language, EntityManagerInterface $entityManager): Response
    {        $this->denyAccessUnlessGranted('ROLE_SUPER_ADMIN');

        if ($this->isCsrfTokenValid('delete'.$language->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($language);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_languages_index', [], Response::HTTP_SEE_OTHER);
    }
}
