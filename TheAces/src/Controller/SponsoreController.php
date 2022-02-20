<?php

namespace App\Controller;


use App\Form\SponsorsType;
use App\Entity\Sponsors;
use App\Repository\SponsorsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
class SponsoreController extends AbstractController
{
    /**
     * @Route("/sponsore", name="sponsore")
     */
    public function index(): Response
    {
        return $this->render('sponsore/index.html.twig', [
            'controller_name' => 'SponsoreController',
        ]);
    }






    /**
     * @Route("/ajouter_spons", name="ajouter_spons")
     */
    public function Ajouter_spons(Request $req): Response
    {
        $Sponsor = new Sponsors();
        $formClassroom = $this->createForm(SponsorsType::class, $Sponsor);
        $formClassroom->handleRequest($req);
        if (($formClassroom->isSubmitted()) && ($formClassroom->isValid()))
        {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($Sponsor);
            $manager->flush();
            return $this->redirectToRoute('afficherSpons');
        }
        return $this->render('sponsore/ajouter_spons.html.twig', [
            'Sponsors' => $formClassroom->createView(),
        ]);

    }

    /**
     * @Route("/afficherSpons", name="afficherSpons")
     */
    public function afficher_spons()
    {
        $Sponsor=$this->getDoctrine()->getRepository(Sponsors::class)->findAll();
        return $this->render('sponsore/afficher_spons.html.twig',[
            'Sponsors'=> $Sponsor ]);


    }


    /**
     * @Route("/supprimerSpons/{id}", name="supprimerSpons")
     */
    public function supprimer_spons($id)
    {
        $sponsor=$this->getDoctrine()->getRepository(Sponsors::class)->find($id);
        $a=$this->getDoctrine()->getManager();
        $a->remove($sponsor);
        $a->flush();
        return $this->redirectToRoute('afficherSpons');
    }

        /**
         * @Route ("/modifierSpons/{id}", name="modifierSpons")
         */
        public function modifier($id,Request $req):Response
    {
        $Sponsor=$this->getDoctrine()->getRepository(Sponsors::class)->find($id);
        $form=$this->createForm(SponsorsType::class,$Sponsor);
        $form->handleRequest($req);

        if($form->isSubmitted() && $form->isValid())
        {
            $a=$this->getDoctrine()->getManager();
            $a->flush();
            return $this->redirectToRoute('afficherSpons');
        }
        return $this->render('sponsore/ajouter_spons.html.twig', [
            'Sponsors'=>$form->createView()

        ]);

    }









}
