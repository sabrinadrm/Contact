<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AcceuilController extends AbstractController
{
    #[Route('/' , name: 'app_homepage', methods: ['GET'])]
    public function index(): Response
    {
        // $nomsStudants = ['Sara','fanny', 'Lucas'];
        // $age = 23;
        
               return $this->render('acceuil/index.html.twig', [
            'controller_name' => 'AcceuilController',
            // 'lesContacts' =>  $nomsStudants,
            // 'age'  => $age 
        ]);
      
    }
}
