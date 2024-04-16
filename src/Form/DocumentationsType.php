<?php

namespace App\Form;

use App\Entity\Documentations;
use App\Entity\DocumentCategory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class DocumentationsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [ // Utilisez TextType au lieu d'un tableau
                'label' => false,
            ])
            ->add('pdf', FileType::class, [
                'label' => false, 
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '20M', // Spécifiez ici la taille maximale
                        'maxSizeMessage' => 'Le fichier est trop grand. La taille maximale autorisée est {{ limit }}.',
                    ]),
                ],
            ])
            ->add('category', EntityType::class, [
                'class' => 'App\Entity\DocumentCategory',
                'choice_label' => 'name',
                'label' => false, 
                'placeholder' => 'Choisissez une catégorie', // Option pour le texte de l'option de placeholder

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Documentations::class,
        ]);
    }
}
