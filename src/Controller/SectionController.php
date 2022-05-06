<?php

namespace App\Controller;

use App\Entity\Section;
use Doctrine\Persistence\ManagerRegistry;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SectionController extends AbstractController
{
    private $repository;
    private $manager;
    public function __construct(private ManagerRegistry $doctrine)
    {

        $this->manager=$this->doctrine->getManager();
        $this->repository=$this->doctrine->getRepository(Section::class);
    }
    #[Route('/section', name: 'app_section')]
    public function index(): Response
    {
        return $this->render('section/index.html.twig', [
            'controller_name' => 'SectionController',
        ]);
    }
}
