<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $passwordHasher;

    // Correct constructor method with dependency injection
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {


        for ($i = 0; $i < 5; $i++) {
            $user = new User();
            $user->setEmail("user" . $i . "@gmail.com");
            $user->setRoles(['ROLE_USER']);

            // Hash the password using injected hasher
            $hashedPassword = $this->passwordHasher->hashPassword($user, '0000');
            $user->setPassword($hashedPassword);

            $manager->persist($user);
        }

        for ($i = 0; $i < 5; $i++) {
            $admin = new User();
            $admin->setEmail("admin" . $i . "@gmail.com");
            $admin->setRoles(['ROLE_ADMIN']);

            // Hash the password for admins
            $hashedPassword = $this->passwordHasher->hashPassword($admin, '0000');
            $admin->setPassword($hashedPassword);

            $manager->persist($admin);
        }

        $manager->flush();
    }
}
