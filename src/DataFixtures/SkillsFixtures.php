<?php

namespace App\DataFixtures;

use App\Entity\Skills;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SkillsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $skill1 = new Skills();
        $skill1->setName('HTML');
        $skill1->setValue(95);

        $skill2 = new Skills();
        $skill2->setName('CSS');
        $skill2->setValue(70);

        $skill3 = new Skills();
        $skill3->setName('JS');
        $skill3->setValue(60);

        $skill4 = new Skills();
        $skill4->setName('HTML');
        $skill4->setValue(95);

        $skill5 = new Skills();
        $skill5->setName('Symfony');
        $skill5->setValue(88);

        $manager->persist($skill1);
        $manager->persist($skill2);
        $manager->persist($skill3);
        $manager->persist($skill4);
        $manager->persist($skill5);

        $manager->flush();
    }
}
