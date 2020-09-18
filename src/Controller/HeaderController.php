<?php

namespace App\Controller;

use App\Repository\ContactRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HeaderController extends AbstractController
{
    /**
     * @Route("/header", name="header")
     */
    public function index(ContactRepository $contactRepository)
    {
        $nb_contacts = count($contactRepository->findAll());
        $user = $this->getUser();

        return $this->render('base.html.twig',[
        'nb_contacts' => $nb_contacts,
        'user' => $user
        ]);
    }





    // public function index()
    // {
    //     return $this->render('header/index.html.twig', [
    //         'controller_name' => 'HeaderController',
    //     ]);
    // }
}
