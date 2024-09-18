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
        for ($i=0; $i<5; $i++){
            $user = new User();
            $user->setEmail("user" . $i . "@gmail.com");
            $user->setRoles(['ROLE_USER', 'ROLE_ADMIN']);
            $user->setPassword("0000");
            $manager->persist($user);
        }
        

        for ($i=0; $i<5; $i++){
            $user = new User();
            $user->setEmail("admin" . $i . "@gmail.com");
            $user->setRoles(['ROLE_USER', 'ROLE_ADMIN']);
            $user->setPassword("0000");
            $manager->persist($user);
        }
        
        $manager->flush();
    }
}
