<?php

namespace App\Controller;

use App\Entity\Photo;
use App\Entity\Article;
use App\Entity\Contact;
use App\Form\PhotoType;
use App\Form\ArticleType;
use App\Repository\PhotoRepository;
use App\Repository\ArticleRepository;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



/**
 * @Route("/admin")
 */
class AdminController extends AbstractController
{



    // /**
    // * @Route("/creation_article", name="creation_article")
    // * @Route("/articles/{id}", name="modif_articles",methods="GET|POST")
    // */
    // public function modif_articles(Article $article = null, Request $request,EntityManagerInterface $em)
    // {
    // if(!$article){
    //     $article = new Article ();
    // }
    // $form = $this->createForm(ArticleType::class,$article);
    // $form->handleRequest($request);
    // if($form->isSubmitted() && $form->isValid()){
    // $em->persist($article);
    // $em->flush();
    // $this->addFlash('success', "L'action a été effectuée");
    // return $this->redirectToRoute("admin_articles");
    // }
    // return $this->render('admin/modification_article.html.twig',[
    //     "article" => $article,
    //     "form" => $form->createView()
    //  ]);
    // }
    // /**
    //  * @Route("/creation_photo", name="creation_photo")
    //  * @Route("/photos/{id}", name="modif_photos",methods="GET|POST")
    //  */
    // public function modif_photos(Photo $photo = null, Request $request,EntityManagerInterface $em)
    // {
    //      if(!$photo){
    //     $photo = new Photo ();
    // }
    // $form = $this->createForm(PhotoType::class,$photo);
    // $form->handleRequest($request);
    // if($form->isSubmitted() && $form->isValid()){
    //     $em->persist($photo);
    //     $em->flush();
    //     $this->addFlash('success', "L'action a été effectuée");
    //     return $this->redirectToRoute("admin_photos");
    //  }
    // return $this->render('admin/modification_photo.html.twig',[
    //         "photo" => $photo,
    //         "form" => $form->createView()
    //  ]);
    // }
    // /**
    //  * @Route("/articles/{id}", name="suppression_article", methods="SUP")
    //  */
    // public function suppression_article(Article $article, Request $request,EntityManagerInterface $em)
    // {
    //     if($this->isCsrfTokenValid("SUP".$article->getId(),$request->get("_token"))){
    //         $em->remove($article);
    //         $em->flush();
    //         $this->addFlash('success', "L'action a bien été effectuée");
    //         return $this->redirectToRoute("admin_articles");
    //     }
    // }

    //  /**
    //  * @Route("/photos/{id}", name="suppression_photo", methods="SUP")
    //  */
    // public function suppression_photo(Photo $photo, Request $request,EntityManagerInterface $em)
    // {
    //     if($this->isCsrfTokenValid("SUP".$photo->getId(),$request->get("_token"))){
    //         $em->remove($photo);
    //         $em->flush();
    //         $this->addFlash('success', "L'action a bien été effectuée");
    //         return $this->redirectToRoute("admin_photos");
    //     }
    // }
    // /**
    //  * @Route("/contacts", name="admin_contacts")
    //  */
    // public function admin_contacts(ContactRepository $contact)
    // {
    //     $contacts = $contact->findAll();
    //     return $this->render('contact/contact.html.twig',[
    //         "contacts" => $contacts,
    //         "admin" => true
    //     ]);
    // }
}
