<?php

namespace App\Controller;

use App\Entity\FicheDePaie;
use App\Form\FicheDePaieType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/fiche/de/paie')]
class FicheDePaieController extends AbstractController
{
    #[Route('/', name: 'app_fiche_de_paie_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $ficheDePaies = $entityManager
            ->getRepository(FicheDePaie::class)
            ->findAll();

        return $this->render('fiche_de_paie/index.html.twig', [
            'fiche_de_paies' => $ficheDePaies,
        ]);
    }

    #[Route('/new', name: 'app_fiche_de_paie_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ficheDePaie = new FicheDePaie();
        $form = $this->createForm(FicheDePaieType::class, $ficheDePaie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ficheDePaie);
            $entityManager->flush();

            return $this->redirectToRoute('app_fiche_de_paie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('fiche_de_paie/new.html.twig', [
            'fiche_de_paie' => $ficheDePaie,
            'form' => $form,
        ]);
    }

    #[Route('/{idFp}', name: 'app_fiche_de_paie_show', methods: ['GET'])]
    public function show(FicheDePaie $ficheDePaie): Response
    {
        return $this->render('fiche_de_paie/show.html.twig', [
            'fiche_de_paie' => $ficheDePaie,
        ]);
    }

    #[Route('/{idFp}/edit', name: 'app_fiche_de_paie_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, FicheDePaie $ficheDePaie, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FicheDePaieType::class, $ficheDePaie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_fiche_de_paie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('fiche_de_paie/edit.html.twig', [
            'fiche_de_paie' => $ficheDePaie,
            'form' => $form,
        ]);
    }

    #[Route('/{idFp}', name: 'app_fiche_de_paie_delete', methods: ['POST'])]
    public function delete(Request $request, FicheDePaie $ficheDePaie, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ficheDePaie->getIdFp(), $request->request->get('_token'))) {
            $entityManager->remove($ficheDePaie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_fiche_de_paie_index', [], Response::HTTP_SEE_OTHER);
    }
}
