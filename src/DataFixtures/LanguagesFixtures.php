<?php

namespace App\DataFixtures;

use App\Entity\Languages;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LanguagesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $language1 = new Languages();
        $language1->setName('Français');
        $language1->setValue(68);

        $language2 = new Languages();
        $language2->setName('Anglais');
        $language2->setValue(60);

        $language3 = new Languages();
        $language3->setName('Espagnol');
        $language3->setValue(30);

        $manager->persist($language1);
        $manager->persist($language2);
        $manager->persist($language3);

        $manager->flush();
    }
}
