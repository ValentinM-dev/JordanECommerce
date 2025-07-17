<?php

namespace App\DataFixtures;

use App\Entity\Accessoire;
use App\Entity\Article;
use App\Entity\Basket;
use App\Entity\Vetement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i=1; $i <31 ; $i++) { 
            $vetement= new Vetement();
            $vetement->setName('Vetement' .$i);
            $vetement->setPrix(random_int(35.00, 150.00));
            $vetement->setTaille("Taille" .$i);
            $vetement->setStock(random_int(0, 10));
            $vetement->setImage('https://media.foot-store.fr/catalog/product/cache/image/1800x/9df78eab33525d08d6e5fb8d27136e95/j/o/jordan_95a873-001_0.jpg');
            $manager->persist($vetement);
            $vetements[] = $vetement;
        }

        for ($i=1; $i <31 ; $i++) { 
            $basket= new Basket();
            $basket->setName('Basket' .$i);
            $basket->setPrix(random_int(35.00, 150.00));
            $basket->setTaille("Taille" .$i);
            $basket->setStock(random_int(0, 10));
            $basket->setImage('https://photos6.spartoo.com/photos/251/25103258/25103258_500_A.jpg');
            $manager->persist($basket);
            $baskets[] = $basket;
        }
        

        for ($i=1; $i < 7 ; $i++) { 
            $accessoire= new Accessoire();
            $accessoire->setCasquette('' .$i);
            $manager->persist($accessoire);
            $accessoires[] = $accessoire;
        }

        for ($i=1; $i < 50; $i++) { 
        $article = new Article();
        $article->setTitre('Jordan' .$i);
        $article->setBasket($baskets[$i % 30]);
        $article->setVetement($vetements[$i % 30]);
        $article->setAccessoire($accessoires[$i % 5]);
        $manager->persist($article);
        }
        $manager->flush();

    }
}
