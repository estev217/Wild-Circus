<?php

namespace App\Controller;

use App\Repository\ImageRepository;
use App\Repository\UserRepository;
use App\Repository\WishRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

Class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="app_index")
     * @param UserRepository $userRepository
     * @param ImageRepository $imageRepository
     * @return Response
     */
    public function index(UserRepository $userRepository, ImageRepository $imageRepository) :Response
    {
        $users = $userRepository->findAll();

        $images = $imageRepository->findAll();

        return $this->render('home.html.twig', [
            'users' => $users,
            'images' => $images,
        ]);
    }

    /**
     * @Route("/purpose", name="purpose")
     * @param ImageRepository $imageRepository
     * @return Response
     */
    public function purpose(ImageRepository $imageRepository) :Response
    {
        $images = $imageRepository->findAll();

        return $this->render('purpose.html.twig', [
            'images' => $images,
        ]);
    }
}
