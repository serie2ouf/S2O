<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AnimeController extends AbstractController
{
    #[Route('/anime', name: 'app_anime_index')]
    public function index(): Response
    {
        return $this->render('anime/index.html.twig', [
            'controller_name' => 'AnimeController',
        ]);
    }
}
