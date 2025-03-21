<?php
namespace App\Service;

use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class FileUploaderHelper {
    private $slugger;
    private $params;
    public function __construct(SluggerInterface $slugger, ParameterBagInterface $params) {
        $this->slugger = $slugger;
        $this->params = $params;
    }
    public function uploadPDF($form, $documentation): String {
        $errorMessage = "";
        $uploadingFile = $form->get('profile_image')->getData();
        if ($uploadingFile) {
            $originalFilename = pathinfo($uploadingFile->getClientOriginalName(), PATHINFO_FILENAME);
            $safeFilename = $this->slugger->slug($originalFilename);
            $newFilename = $safeFilename.'.'.$uploadingFile->guessExtension();
            try {
                $uploadingFile->move(
                    $this->params->get('pdf_directory'),
                    $newFilename
                );
            } catch (FileException $e) {
               $errorMessage = $e->getMessage();
            }
            $user->setPdf($newFilename);
        }
        return $errorMessage;
    }
}