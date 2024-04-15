<?php

namespace App\Controller;

use App\Entity\Catégorie;
use App\Repository\CatégorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CatégorieController extends AbstractController
{
    #[Route('/catégories', name: 'app_catégories',  methods: ['GET'])]
    public function index(CatégorieRepository $repo ): Response
    {
        // $manager= $this->getDoctrine()->getManager();
        //  $repo =$manager ->getRepository(Catégorie::class);
        $categories = $repo ->findAll();


        return $this->render('catégorie/LesCatégories.html.twig', [
            // 'controller_name' => 'CatégorieController',
             'LesCategories' => $categories

        ]);
    }

    #[Route('/catégorie/{id}', name: 'app_catégorie',  methods: ['GET'])]
    public function categorie($id,CatégorieRepository $repo): Response
    {  
        // $manager= $this->getDoctrine()->getManager();
        //  $repo =$manager ->getRepository(Catégorie::class);
        $categorie = $repo ->find($id);


        return $this->render('catégorie/ficheCatégorie.html.twig', [
            // 'controller_name' => 'CatégorieController',
          'LaCategorie' => $categorie


        ]);
    }


}
