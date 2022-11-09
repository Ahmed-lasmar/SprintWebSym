<?php

namespace App\Controller;

use App\Entity\Postule;
use App\Form\PostuleType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/postule')]
class PostuleController extends AbstractController
{
    #[Route('/', name: 'app_postule_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $postules = $entityManager
            ->getRepository(Postule::class)
            ->findAll();

        return $this->render('postule/index.html.twig', [
            'postules' => $postules,
        ]);
    }

    #[Route('/new', name: 'app_postule_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $postule = new Postule();
        $form = $this->createForm(PostuleType::class, $postule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($postule);
            $entityManager->flush();

            return $this->redirectToRoute('app_postule_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('postule/new.html.twig', [
            'postule' => $postule,
            'form' => $form,
        ]);
    }

    #[Route('/{idPost}', name: 'app_postule_show', methods: ['GET'])]
    public function show(Postule $postule): Response
    {
        return $this->render('postule/show.html.twig', [
            'postule' => $postule,
        ]);
    }

    #[Route('/{idPost}/edit', name: 'app_postule_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Postule $postule, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PostuleType::class, $postule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_postule_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('postule/edit.html.twig', [
            'postule' => $postule,
            'form' => $form,
        ]);
    }

    #[Route('/{idPost}', name: 'app_postule_delete', methods: ['POST'])]
    public function delete(Request $request, Postule $postule, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$postule->getIdPost(), $request->request->get('_token'))) {
            $entityManager->remove($postule);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_postule_index', [], Response::HTTP_SEE_OTHER);
    }
}
