<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
Use Faker\Factory;
use App\Entity\Personne;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker1 = Factory::create('fr_FR');
        for ($i=0; $i < 50; $i++) { 
            # code...
            $pers = new Personne();
            $pers->setNom($faker1->firstName());
            $pers->setPrenom($faker1->lastName());
            $pers->setAdresse($faker1->streetName());
            $pers->setTel($faker1->e164PhoneNumber());
            $manager->persist($pers);
        }
       
        $manager->flush();
    }
}
