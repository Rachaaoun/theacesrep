<?php

namespace App\Controller;

use App\Entity\Tournoi;
use App\Form\TournoiType;
use App\Repository\TournoiRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;


/**
 * @Route("/tournoi")
 */
class TournoiController extends AbstractController
{
    /**
     * @Route("/", name="tournoi_index", methods={"GET"})
     */
    public function index(TournoiRepository $tournoiRepository): Response
    {
        return $this->render('tournoi/index.html.twig', [
            'tournois' => $tournoiRepository->findAll(),
        ]);
    }

     /**
     * @Route("/list", name="tournoi_list", methods={"GET"})
     */
    public function listt(TournoiRepository $tournoiRepository): Response
    {
        return $this->render('tournoi/list.html.twig', [
            'tournois' => $tournoiRepository->findAll(),
        ]);
    }

     /**
     * @Route("/participer/{id}", name="tournoi_participer", methods={"GET"})
     */
    public function participer(TournoiRepository $tournoiRepository, $id,EntityManagerInterface $entityManager): Response
    {
        $tournoi=$tournoiRepository->findOneById($id);
        $nbparticipant = $tournoi->getNbparticipant();
        $tournoi->setNbparticipant($nbparticipant-1);
        $entityManager->persist($tournoi);
        $entityManager->flush();

        return $this->render('tournoi/list.html.twig', [
            'tournois' => $tournoiRepository->findAll(),
        ]);
    }


    /**
     * @Route("/new", name="tournoi_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $tournoi = new Tournoi();
        $form = $this->createForm(TournoiType::class, $tournoi);
        $form->handleRequest($request);

        $brochureFile = $form->get('image')->getData();
        
        // this condition is needed because the 'brochure' field is not required
        // so the PDF file must be processed only when a file is uploaded
        if ( $form->isSubmitted() && $form->isValid()) {
            $file=$form->get('image')->getData();
            $fileName=md5(uniqid()).'.'.$file->guessExtension();
            try{
                $file->move($this->getParameter('brochures_directory'),$fileName);
            }catch(FileException $e){
    
            }
          
            $tournoi->setImage($fileName);
            $entityManager->persist($tournoi);
            $entityManager->flush();
            // updates the 'brochureFilename' property to store the PDF file name
            // instead of its contents
            
            return $this->redirectToRoute('tournoi_index', [], Response::HTTP_SEE_OTHER);
        
        }


        return $this->render('tournoi/new.html.twig', [
            'tournoi' => $tournoi,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tournoi_show", methods={"GET"})
     */
    public function show(Tournoi $tournoi): Response
    {
        return $this->render('tournoi/show.html.twig', [
            'tournoi' => $tournoi,
        ]);
    }
    /** 
    * @Route("/{id}/sponsors", name="tournoi_sponsors", methods={"GET"})
    */
   public function getSponsors(Tournoi $tournoi): Response
   {
       return $this->render('tournoi/sponsors.html.twig', [
           'sponsors' => $tournoi->getSponsors(),
       ]);
   }

    /**
     * @Route("/{id}/edit", name="tournoi_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Tournoi $tournoi, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TournoiType::class, $tournoi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('tournoi_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('tournoi/edit.html.twig', [
            'tournoi' => $tournoi,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tournoi_delete", methods={"POST"})
     */
    public function delete(Request $request, Tournoi $tournoi, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tournoi->getId(), $request->request->get('_token'))) {
            $entityManager->remove($tournoi);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tournoi_index', [], Response::HTTP_SEE_OTHER);
    }



}
