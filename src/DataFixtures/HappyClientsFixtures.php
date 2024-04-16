<?php

namespace App\DataFixtures;

use App\Entity\HappyClients;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class HappyClientsFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher) {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $happy = new HappyClients();
        $happy->setValue(5);
        $manager->persist($happy);        
        $manager->flush();


    }
}