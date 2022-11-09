<?php

namespace App\Controller;

use App\Entity\Offreemploi;
use App\Form\OffreemploiType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/offreemploi')]
class OffreemploiController extends AbstractController
{
    #[Route('/', name: 'app_offreemploi_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $offreemplois = $entityManager
            ->getRepository(Offreemploi::class)
            ->findAll();

        return $this->render('offreemploi/index.html.twig', [
            'offreemplois' => $offreemplois,
        ]);
    }

    #[Route('/new', name: 'app_offreemploi_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $offreemploi = new Offreemploi();
        $form = $this->createForm(OffreemploiType::class, $offreemploi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($offreemploi);
            $entityManager->flush();

            return $this->redirectToRoute('app_offreemploi_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('offreemploi/new.html.twig', [
            'offreemploi' => $offreemploi,
            'form' => $form,
        ]);
    }

    #[Route('/{idOffre}', name: 'app_offreemploi_show', methods: ['GET'])]
    public function show(Offreemploi $offreemploi): Response
    {
        return $this->render('offreemploi/show.html.twig', [
            'offreemploi' => $offreemploi,
        ]);
    }

    #[Route('/{idOffre}/edit', name: 'app_offreemploi_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Offreemploi $offreemploi, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(OffreemploiType::class, $offreemploi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_offreemploi_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('offreemploi/edit.html.twig', [
            'offreemploi' => $offreemploi,
            'form' => $form,
        ]);
    }

    #[Route('/{idOffre}', name: 'app_offreemploi_delete', methods: ['POST'])]
    public function delete(Request $request, Offreemploi $offreemploi, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$offreemploi->getIdOffre(), $request->request->get('_token'))) {
            $entityManager->remove($offreemploi);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_offreemploi_index', [], Response::HTTP_SEE_OTHER);
    }
}
