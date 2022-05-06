<?php

namespace App\Controller;

use App\Entity\Etudiant;
use Doctrine\Persistence\ManagerRegistry;
use App\Form\EtudiantType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

    #[Route('/etudiant', name: 'app_etudiant')]
class EtudiantController extends AbstractController
{
    private $repository;
    private $manager;
    public function __construct(private ManagerRegistry $doctrine)
    {

        $this->manager=$this->doctrine->getManager();

        $this->repository=$this->doctrine->getRepository(Etudiant::class);
    }
    #[Route('/show', name: 'app_etudiant_show')]

        public function show(): Response
    {
        $etudiants=$this->repository->findAll();

        return $this->render('etudiant/liste_des_etudians.html.twig', [
            'etudiants' => $etudiants,
        ]);
    }
    #[Route('/add', name: 'app_etudiant_add')]
    public function add(Request $request):Response{

        $etudiant=new Etudiant();

//        $form=$this->createForm(EtudiantType::class,$etudiant,[
//            'action'=>$this->generateUrl('app_etudiant_add'),
//            'method'=>'POST'
//        ]);
        $form=$this->createForm(EtudiantType::class,$etudiant);

        $form->handleRequest($request);
        if($form->isSubmitted()){

            $this->manager->persist($etudiant);
            $this->manager->flush();
            return $this->forward('App\Controller\\EtudiantController::show');

        }
        return $this->render('etudiant/index.html.twig',[
            'form'=>$form->createView()
        ]);


    }
    #[Route('/delete/{id}', name: 'app_etudiant_delete')]
    public function delete(Etudiant $etudiant=null):Response{
        if(!$etudiant){
            $this->addFlash('error','etudiant is not founded');
            throw  NotFoundHttpException('etudiant not found');
        }
        $this->manager->remove($etudiant);
        $this->manager->flush();
        $this->addFlash('success','etudiant is successfully removed');
        return $this->redirectToRoute('app_etudiant_show');


    }
    #[Route('/edit/{id?0}', name: 'app_etudiant_edit')]
    public function edit(Request $request,Etudiant $etudiant=null):Response{
        if(!$etudiant)
            $etudiant=new Etudiant();

        $form=$this->createForm(EtudiantType::class,$etudiant,[
            'action'=>$this->generateUrl('app_etudiant_add'),
            'method'=>'POST'
        ]);

        $form->handleRequest($request);
        if($form->isSubmitted()){

            $this->manager->persist($etudiant);
            $this->manager->flush();
            return $this->forward('App\Controller\\EtudiantController::show');

        }
        return $this->render('etudiant/index.html.twig',[
            'form'=>$form->createView()
        ]);


    }



    }
