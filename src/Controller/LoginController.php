<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\LoginType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/login')]
class LoginController extends AbstractController
{
    #[Route('/', name: 'app_login')]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $user=new User();
        $form=$this->createForm(LoginType::class,$user );
        $form->handleRequest($request);

        if ($form->isSubmitted()){
            $em=$doctrine->getManager();
            $em->persist($user);
            $em->flush();
        }
        return $this->render('login/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
