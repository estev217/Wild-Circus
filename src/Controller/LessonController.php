<?php

namespace App\Controller;

use App\Entity\Lesson;
use App\Entity\Wish;
use App\Form\LessonType;
use App\Form\LionType;
use App\Form\WishType;
use App\Repository\LessonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/lesson")
 */
class LessonController extends AbstractController
{
    /**
     * @Route("/trainings", name="lesson_train", methods={"GET"})
     * @param LessonRepository $lessonRepository
     * @return Response
     */
    public function train(LessonRepository $lessonRepository): Response
    {
        return $this->render('lesson/train.html.twig', [
            'lessons' => $lessonRepository->findBy(['category' => 'train']),
        ]);
    }

    /**
     * @Route("/clownery", name="lesson_clown", methods={"GET"})
     * @param LessonRepository $lessonRepository
     * @return Response
     */
    public function clown(LessonRepository $lessonRepository): Response
    {
        return $this->render('lesson/clown.html.twig', [
            'lessons' => $lessonRepository->findBy(['category' => 'clownery']),
        ]);
    }

    /**
     * @Route("/acrobatics", name="lesson_acrobatic", methods={"GET"})
     * @param LessonRepository $lessonRepository
     * @return Response
     */
    public function acrobatic(LessonRepository $lessonRepository): Response
    {
        return $this->render('lesson/acrobatic.html.twig', [
            'lessons' => $lessonRepository->findBy(['category' => 'acrobatics']),
        ]);
    }

    /**
     * @Route("/new", name="lesson_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $wish = new Wish();
        $form = $this->createForm(WishType::class, $wish);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($wish);
            $entityManager->flush();

            return $this->redirectToRoute('wish_index');
        }

        return $this->render('lesson/new.html.twig', [
            'wish' => $wish,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lesson_show", methods={"GET"})
     */
    public function show(Lesson $lesson): Response
    {
        return $this->render('lesson/show.html.twig', [
            'lesson' => $lesson,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="lesson_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Lesson $lesson): Response
    {
        $form = $this->createForm(LessonType::class, $lesson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lesson_index');
        }

        return $this->render('lesson/edit.html.twig', [
            'lesson' => $lesson,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lesson_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Lesson $lesson): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lesson->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($lesson);
            $entityManager->flush();
        }

        return $this->redirectToRoute('lesson_index');
    }

}
