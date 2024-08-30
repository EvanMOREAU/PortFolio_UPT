<?php

// namespace App\Controller;

// use Symfony\Component\Mime\Email;
// use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\Mailer\MailerInterface;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\Routing\Attribute\Route;
// use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// class ContactController extends AbstractController
// {
//     #[Route('/contact', name: 'app_contact', methods: ['GET', 'POST'])]
//     public function index(Request $request, MailerInterface $mailer): Response
//     {
//         dump("ok");
//         if ($request->isMethod('POST')) {
//             $name = $request->request->get('name');
//             $email = $request->request->get('email');
//             $message = $request->request->get('message');
//             dump('OK1');
//             // Validation basique
//             if (!empty($name) && !empty($email) && !empty($message)) {
//                 // Crée l'email
//                 $email = (new Email())
//                     ->from($email)
//                     ->to('evan.moreau@etik.com') // Remplacez par votre adresse email
//                     ->subject('Nouveau message de contact du PORTFOLIO')
//                     ->text(
//                         "Nom: " . $name . "\n" .
//                         "Email: " . $email . "\n\n" .
//                         "Message:\n" . $message
//                     );
//                     dump("ok2");
//                 // Envoie l'email
//                 $mailer->send($email);

//                 // Affiche un message de succès
//                 $this->addFlash('success', 'Votre message a été envoyé avec succès !');

//                 return $this->redirectToRoute('contact');
//             } else {
//                 $this->addFlash('error', 'Tous les champs sont obligatoires.');
//             }
//         }

//         return $this->redirectToRoute('app_main');
//     }
// }
