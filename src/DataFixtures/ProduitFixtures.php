<?php

namespace App\DataFixtures;
use App\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProduitFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        for ($i = 0; $i <= 5; $i++){
            $produit = new Produit(); 
             $produit->setNom("produit $i")
             ->setPrix($i+0.2)
             ->setDescription("le produit $i est bon")
             ->setImage("http://placeholder.it/650x250")
             ->setCreatedAt(new \DateTime());
             $manager->persist($produit);
         }
 
        $manager->flush();
    }
}
