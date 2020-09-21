<?php

namespace App\Controller;

use App\Entity\Photo;
use App\Form\PhotoType;
use App\Repository\PhotoRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin/photo")
 */
class PhotoController extends AbstractController
{
    /**
     * @Route("/", name="photos_admin", methods={"GET"})
     */
    public function index(PhotoRepository $photoRepository,PaginatorInterface $paginatorInterface, Request $request): Response
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
     * @Route("/new", name="photo_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $photo = new Photo();
        $form = $this->createForm(PhotoType::class, $photo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($photo);
            $entityManager->flush();

            $this->addFlash('success', "L'action a bien été effectuée");
            return $this->redirectToRoute('photos_admin');
        }

        return $this->render('photo/new.html.twig', [
            'photo' => $photo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="photo_show", methods={"GET"})
     */
    public function show(Photo $photo): Response
    {
        return $this->render('photo/show.html.twig', [
            'photo' => $photo,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="photo_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Photo $photo): Response
    {
        $form = $this->createForm(PhotoType::class, $photo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', "L'action a bien été effectuée");
            return $this->redirectToRoute('photos_admin');
        }

        return $this->render('photo/edit.html.twig', [
            'photo' => $photo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="photo_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Photo $photo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$photo->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($photo);
            $entityManager->flush();
        }

        $this->addFlash('success', "L'action a bien été effectuée");
        return $this->redirectToRoute('photos_admin');
    }
}
