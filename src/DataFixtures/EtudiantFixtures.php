<?php

namespace App\DataFixtures;

use App\Entity\Etudiant;
use App\Entity\Section;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;

class EtudiantFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
            //instantiating new sections
            $section1=new Section();
            $section2=new Section();
            $section1->setDesignation('section1');
            $section2->setDesignation('section2');
            $manager->persist($section1);
            $manager->persist($section2);

            //instantiating new students
            $etudiant1=new Etudiant();
            $etudiant1->setNom("achour");
            $etudiant1->setPrenom("oussama");
            $etudiant1->setSection($section1);
            $manager->persist($etudiant1);


            $etudiant2=new Etudiant();
            $etudiant2->setNom("achour");
            $etudiant2->setPrenom("marwene");
            $etudiant2->setSection($section2);
            $manager->persist($etudiant2);

            //this student has no section
            $etudiant3=new Etudiant();
            $etudiant3->setNom("toukebri");
            $etudiant3->setPrenom("marwa");
            $manager->persist($etudiant3);



        $manager->flush();
    }
}
