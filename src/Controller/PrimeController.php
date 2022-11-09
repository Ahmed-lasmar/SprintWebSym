<?php

namespace App\Controller;

use App\Entity\Prime;
use App\Form\PrimeType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/prime')]
class PrimeController extends AbstractController
{
    #[Route('/', name: 'app_prime_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $primes = $entityManager
            ->getRepository(Prime::class)
            ->findAll();

        return $this->render('prime/index.html.twig', [
            'primes' => $primes,
        ]);
    }

    #[Route('/new', name: 'app_prime_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $prime = new Prime();
        $form = $this->createForm(PrimeType::class, $prime);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($prime);
            $entityManager->flush();

            return $this->redirectToRoute('app_prime_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('prime/new.html.twig', [
            'prime' => $prime,
            'form' => $form,
        ]);
    }

    #[Route('/{idPrime}', name: 'app_prime_show', methods: ['GET'])]
    public function show(Prime $prime): Response
    {
        return $this->render('prime/show.html.twig', [
            'prime' => $prime,
        ]);
    }

    #[Route('/{idPrime}/edit', name: 'app_prime_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Prime $prime, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PrimeType::class, $prime);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_prime_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('prime/edit.html.twig', [
            'prime' => $prime,
            'form' => $form,
        ]);
    }

    #[Route('/{idPrime}', name: 'app_prime_delete', methods: ['POST'])]
    public function delete(Request $request, Prime $prime, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$prime->getIdPrime(), $request->request->get('_token'))) {
            $entityManager->remove($prime);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_prime_index', [], Response::HTTP_SEE_OTHER);
    }
}
