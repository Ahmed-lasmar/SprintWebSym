<?php

namespace App\Controller;

use App\Entity\Formatteur;
use App\Form\FormatteurType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/formatteur')]
class FormatteurController extends AbstractController
{
    #[Route('/', name: 'app_formatteur_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $formatteurs = $entityManager
            ->getRepository(Formatteur::class)
            ->findAll();

        return $this->render('formatteur/index.html.twig', [
            'formatteurs' => $formatteurs,
        ]);
    }

    #[Route('/new', name: 'app_formatteur_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $formatteur = new Formatteur();
        $form = $this->createForm(FormatteurType::class, $formatteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($formatteur);
            $entityManager->flush();

            return $this->redirectToRoute('app_formatteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('formatteur/new.html.twig', [
            'formatteur' => $formatteur,
            'form' => $form,
        ]);
    }

    #[Route('/{idFormatteur}', name: 'app_formatteur_show', methods: ['GET'])]
    public function show(Formatteur $formatteur): Response
    {
        return $this->render('formatteur/show.html.twig', [
            'formatteur' => $formatteur,
        ]);
    }

    #[Route('/{idFormatteur}/edit', name: 'app_formatteur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Formatteur $formatteur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FormatteurType::class, $formatteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_formatteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('formatteur/edit.html.twig', [
            'formatteur' => $formatteur,
            'form' => $form,
        ]);
    }

    #[Route('/{idFormatteur}', name: 'app_formatteur_delete', methods: ['POST'])]
    public function delete(Request $request, Formatteur $formatteur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$formatteur->getIdFormatteur(), $request->request->get('_token'))) {
            $entityManager->remove($formatteur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_formatteur_index', [], Response::HTTP_SEE_OTHER);
    }
}
