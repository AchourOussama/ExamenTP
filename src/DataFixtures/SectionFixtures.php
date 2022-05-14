<?php

namespace App\DataFixtures;

use App\Entity\Section;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SectionFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i=1;$i<8;$i++){
            $section=new Section();
            $section->setDesignation("section".$i);
            $manager->persist($section);


        }

        $manager->flush();
    }
}
