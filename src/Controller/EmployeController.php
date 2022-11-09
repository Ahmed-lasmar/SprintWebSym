<?php

namespace App\Controller;

use App\Entity\Employe;
use App\Form\EmployeType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/employe')]
class EmployeController extends AbstractController
{
    #[Route('/', name: 'app_employe_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $employes = $entityManager
            ->getRepository(Employe::class)
            ->findAll();

        return $this->render('employe/index.html.twig', [
            'employes' => $employes,
        ]);
    }

    #[Route('/new', name: 'app_employe_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $employe = new Employe();
        $form = $this->createForm(EmployeType::class, $employe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($employe);
            $entityManager->flush();

            return $this->redirectToRoute('app_employe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('employe/new.html.twig', [
            'employe' => $employe,
            'form' => $form,
        ]);
    }

    #[Route('/{idPer}', name: 'app_employe_show', methods: ['GET'])]
    public function show(Employe $employe): Response
    {
        return $this->render('employe/show.html.twig', [
            'employe' => $employe,
        ]);
    }

    #[Route('/{idPer}/edit', name: 'app_employe_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Employe $employe, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EmployeType::class, $employe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_employe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('employe/edit.html.twig', [
            'employe' => $employe,
            'form' => $form,
        ]);
    }

    #[Route('/{idPer}', name: 'app_employe_delete', methods: ['POST'])]
    public function delete(Request $request, Employe $employe, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$employe->getIdPer(), $request->request->get('_token'))) {
            $entityManager->remove($employe);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_employe_index', [], Response::HTTP_SEE_OTHER);
    }
}
