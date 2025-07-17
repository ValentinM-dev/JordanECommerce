<?php

namespace App\DataFixtures;

use App\Entity\Accessoire;
use App\Entity\Article;
use App\Entity\Basket;
use App\Entity\Product;
use App\Entity\Type;
use App\Entity\Vetement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $typeTitles = ['Chaussures', 'Tee-shirt', 'Pull', 'Chaussettes', 'Slip Kangourou'];
        $typeEntities = [];
        foreach ($typeTitles as $title) { 
            $type = new Type();
            $type->setName($title);
            $manager->persist($type);
            $typeEntities[] = $type;
        }

        for ($i=0; $i < 20; $i++) { 
            $product = new Product();
            $product->setNom("Jordan {$i}");
            $product->setPrice(rand(50, 200));
            $product->setQuantity(rand(1, 100));
            $product->setType($typeEntities[array_rand($typeEntities)]);

            $manager->persist($product);
        }

        $manager->flush();

    }
}
