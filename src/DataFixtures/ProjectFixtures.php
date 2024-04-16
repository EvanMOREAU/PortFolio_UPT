<?php

namespace App\DataFixtures;

use App\Entity\Project;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProjectFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $project1 = new Project();
        $project1->setName('PikPik Le Poivre Normand');
        $project1->setLink('');
        $project1->setDescription('Site vitrine à destination de la mini entreprise "PikPik Le Poivre Normand" réalisée par les 3ème Prepa Pro du Lycée Notre Dame La Providence.');
        $project1->setYear(new DateTime('2023-02-01'));
        $manager->persist($project1);

        $project2 = new Project();
        $project2->setName('Anciens NDLP');
        $project2->setLink('');
        $project2->setDescription('Site CMS à destination de l\'association des anciens élèves du Lycée Notre Dame La Providence.');
        $project2->setYear(new DateTime('2023-03-01'));
        $manager->persist($project2);

        $project3 = new Project();
        $project3->setName('FC-PRO');
        $project3->setLink('');
        $project3->setDescription('Site à destination du centre de formation du Lycée Notre Dame La Providence. Ce dernier devait être construit à base de CRUD pour que la gestionnaire du centre de formation puisse l\'alimenter elle même. Ce dernier à été fait sur la framework symfony.');
        $project3->setYear(new DateTime('2023-05-01'));
        $manager->persist($project3);
        
        $project4 = new Project();
        $project4->setName('URHAJ Normandie [Stage]');
        $project4->setLink('');
        $project4->setDescription('Site à destination de l\'association URHAJ (Union Régionale pour l\'Habitat des Jeunes) Normandie. Ce dernier devait être construit à base de CRUD pour que les chargés de mission puisse l\'alimenter eux même. Ce dernier à été fait sur la framework symfony.');
        $project4->setYear(new DateTime('2023-08-01'));
        $manager->persist($project4);

        $project5 = new Project();
        $project5->setName('Le Phare De L\'Âme [Stage]');
        $project5->setLink('');
        $project5->setDescription('Site à destination de l\'entreprise Le Phare De L\'Âme. Ce dernier devait être construit à base de CRUD pour que la dirigeante puisse l\'alimenter elle même. Ce dernier à été fait sur la framework symfony.');
        $project5->setYear(new DateTime('2024-02-01'));
        $manager->persist($project5);

        $manager->flush();
    }
}
