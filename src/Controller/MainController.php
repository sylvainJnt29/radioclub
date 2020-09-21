<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\PhotoRepository;
use App\Repository\ArticleRepository;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\UtilisateurRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class MainController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index()
    {
        return $this->render('main/accueil.html.twig');
    }

    /**
     * @Route("/contacter", name="contacter",methods="GET|POST")
     */
    public function contact(Contact $contact = null,Request $request,EntityManagerInterface $em, ContactRepository $contactRepository)
    {
        $contact = new Contact();
        $form= $this->createForm(ContactType::class,$contact);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($contact);
            $em->flush();
            $this->addFlash('success', "Nous avons bien enregistré votre message, nous vous recontactarons dès que possible.");
            return $this->redirectToRoute("contacter");
        }
        $messageRecu=$contactRepository->findAll();
        return $this->render('contact/contact.html.twig',[
            'form' => $form->createView(),
            'messageRecu' => $messageRecu,
            "admin" => false
        ]);
    }

        /**
     * @Route("/articles", name="articles")
     */
    public function index_articles(ArticleRepository $articleRepository,PaginatorInterface $paginatorInterface, Request $request)
    {
        $articles = $paginatorInterface->paginate(
        $articleRepository->findAllWithPagination(),
        $request->query->getInt('page',1),
        6
        );
        return $this->render('article/articles.html.twig',[
            "articles" => $articles,
            "admin" => false
        ]);
    }

    /**
     * @Route("/", name="photos_admin", methods={"GET"})
     */
    public function index_photos(PhotoRepository $photoRepository,PaginatorInterface $paginatorInterface, Request $request): Response
    {
        $photos = $paginatorInterface->paginate(
        $photoRepository->findAllWithPagination(),
        $request->query->getInt('page',1),
        6
        );
        return $this->render('photo/index.html.twig', [
            'photos' => $photos,
            'admin' => false
        ]);
    }

    /**
     * @Route("/photos", name="photos")
     */
    public function admin_photos(PhotoRepository $photoRepository, PaginatorInterface $paginatorInterface, Request $request)
    {
        $photos = $paginatorInterface->paginate(
        $photoRepository->findAllWithPagination(),
        $request->query->getInt('page',1),
        6
        );
        
        return $this->render('photo/photos.html.twig', [
            'photos' => $photos,
            "admin" => false
        ]);
    }


}
