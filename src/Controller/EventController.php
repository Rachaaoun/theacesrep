<?php

namespace App\Controller;

use App\Entity\Tournoi;
use App\Form\TournoiType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;




class EventController extends AbstractController
{
    /**
     * @Route("/tournoi", name="event")
     */
    public function index(): Response
   {
        return $this->render('event/tournoi.html.twig', [
            'controller_name' => 'EventController',
        ]);
   }

// ...




    /**
     * @Route("/ajouter", name="ajouter")
     */
    public function Ajouter(Request $req): Response
    {
        $Tournoi = new Tournoi();
        $formClassroom = $this->createForm(TournoiType::class, $Tournoi);
        $formClassroom->handleRequest($req);
        if (($formClassroom->isSubmitted()) && ($formClassroom->isValid()))
        {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($Tournoi);
            $manager->flush();
            return $this->redirectToRoute('afficher');
        }
        return $this->render('event/ajouter.twig', [
            'Tournois' => $formClassroom->createView(),
        ]);

    }

    /**
     * @Route("/afficher", name="afficher")
     */
    public function afficher()
    {
        $Tournoi=$this->getDoctrine()->getRepository(Tournoi::class)->findAll();
        return $this->render('event/afficher.html.twig',[
            'Tournois'=> $Tournoi ]);


    }


    /**
     * @Route("/supprimerTournoi/{name}", name="supprimerTournoi")
     */
    public function supprimer($name)
    {
        $Tournoi=$this->getDoctrine()->getRepository(Tournoi::class)->find($name);
        $a=$this->getDoctrine()->getManager();
        $a->remove($Tournoi);
        $a->flush();
        return $this->redirectToRoute('afficher');
    }
    /**
     * @Route ("/modifierTournoi/{name}", name="modifierTournoi")
     */
    public function modifier($name,Request $req)
    {
        $Tournoi=$this->getDoctrine()->getRepository(Tournoi::class)->find($name);
        $form=$this->createForm(TournoiType::class,$Tournoi);
        $form->handleRequest($req);

        if($form->isSubmitted() && $form->isValid())
        {
            $a=$this->getDoctrine()->getManager();
            $a->flush();
            return $this->redirectToRoute('afficher');
        }
        return $this->render('event/Ajouter.twig', [
            'Tournois'=>$form->createView()

        ]);
    }



























}
