<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Form\AnnonceType;
use App\Repository\AnnonceRepository;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\String_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\String\Slugger\SluggerInterface;

class AnnonceController extends AbstractController
{
    /**
     * @Route("/annonces", name="annonces")
     */

    public function annonce(AnnonceRepository $annonceRepository): Response
    {
        return $this->render('annonce.html.twig', [
            'annonces' => $annonceRepository->findAll()
        ]);
    }

    /**
     * @Route("/annonces/add", name="addAnnonce")
    */

    public function addAnnonce(EntityManagerInterface $entityManager, Request $request, SluggerInterface $slugger): Response
    {
        $annonce = new Annonce();

        $form = $this->createForm(AnnonceType::class,$annonce);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $picture = $form->get('picture')->getData();

            $originalFilename = pathinfo($picture->getClientOriginalName(), PATHINFO_FILENAME);

            $safeFilename = $slugger->slug($originalFilename);

            $newFilename = $safeFilename.'-'.uniqid().'.'.$picture->guessExtension();

            $picture->move(
                $this->getParameter('images_directory'),
                $newFilename
            );
            $annonce->setPicture($newFilename);
            $annonce->setPublishedAt(new \DateTimeImmutable());
            $annonce->setUser($this->getUser()->getUserIdentifier());

            $entityManager->persist($annonce);
            $entityManager->flush();

            $this->addFlash('success','Annonce publié');
        }

        return $this->render("addAnnonce.html.twig", [
            'form' => $form->createView()
        ]);
    }
}

