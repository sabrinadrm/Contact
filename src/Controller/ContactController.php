<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    #[Route('/contacts', name: 'app_contacts', methods: ['GET'])]
        public function index(ContactRepository $repo): Response
        {
            // $manager= $this->getDoctrine()->getManager();
            // $repo =$manager ->getRepository(Contact::class);
            $contacts= $repo ->findAll();
            // dump($contacts); permet de voir ce que contient $contacts


            return $this->render('contact/listeContacts.html.twig', [
                // 'controller_name' => 'ContactController',
                'LesContacts' => $contacts
            ]);
    }
    
    #[Route('/contact/{id}', name: 'app_contact', methods: ['GET'])]
        public function contact($id, ContactRepository $repo ): Response
        {
            // $manager= $this->getDoctrine()->getManager();
            // $repo =$manager ->getRepository(Contact::class);
            $contact= $repo ->find($id);


            return $this->render('contact/ficheContact.html.twig', [
                // 'controller_name' => 'ContactController',
                 'lecontact' => $contact
                
            ]);
        }

    #[Route('/contact/sexe/{sexe}', name: 'app_contactSexe', methods: ['GET'])]
    public function contactsexe($sexe, ContactRepository $repo ): Response
    {
        // $manager= $this->getDoctrine()->getManager();
        // $repo =$manager ->getRepository(Contact::class);
    
        $contacts= $repo ->findBy(
            ['sexe' => $sexe],
            ['nom' => 'ASC']
        );


        return $this->render('contact/listeContacts.html.twig', [
            // 'controller_name' => 'ContactController',
            'LesContacts' => $contacts
            
        ]);
    }

}
