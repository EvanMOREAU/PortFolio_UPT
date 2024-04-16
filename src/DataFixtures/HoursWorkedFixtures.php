<?php

namespace App\DataFixtures;

use App\Entity\HoursWorked;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class HoursWorkedFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher) {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $hours = new HoursWorked();
        $hours->setValue(700);
        $manager->persist($hours);        
        $manager->flush();


    }
}