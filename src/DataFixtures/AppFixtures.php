<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use App\Entity\Status;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; $i++) {
            $product = new Product();
            $product->setImage($i);
            $product->setName('product '.$i);
            $product->setPrice(mt_rand(10, 100));
            $product->setQuantityStock($i+10);
            $manager->persist($product);
        }

            $status = new Status();
            $status->setTitleStatus('Administrator');
            $manager->persist($status);

            $status = new Category();
            $status -> setTitleCategory('New');
            $status -> setTitleCategory('In progress');
            $status -> setTitleCategory('Done');
            $manager->persist($status);


        for ($i = 0; $i < 20; $i++) {
            $user = new User();
            $user->setEmail('testgmail'.$i.'@gmail.com');
            $user->setUsername('name'.$i);
            $user->setPassword('name$'.$i);
            $user->setFullName('name$'.$i.'75');
            $manager->persist($user);
        }

        $manager->flush();
    }
}