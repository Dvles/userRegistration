<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $user = new User();
        $user->setEmail("user@gmail.com");
        $user->setRoles(['ROLE_USER', 'ROLE_ADMIN']);
        $user->setPassword("0000");
        // for ($i = 0; $i < 5)
        $manager->persist($user);
        $manager->flush();
    }
}
