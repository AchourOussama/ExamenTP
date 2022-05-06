<?php

namespace App\DataFixtures;

use App\Entity\Etudiant;
use App\Entity\Section;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EtudiantFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

            $etudiant1=new Etudiant();
            $etudiant1->setNom("Achour");
            $etudiant1->setPrénom("oussama");
//            $etudiant1->setInscription("section2");
            $manager->persist($etudiant1);

            $etudiant2=new Etudiant();
            $etudiant2->setNom("smith");
            $etudiant2->setPrénom("john");
            $manager->persist($etudiant2);

            $etudiant3=new Etudiant();
            $etudiant3->setNom("mark");
            $etudiant3->setPrénom("brown");
//            $etudiant3->setInscription();
            $manager->persist($etudiant3);



        $manager->flush();
    }
}
