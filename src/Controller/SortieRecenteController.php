<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SortieRecenteController extends AbstractController
{
    #[Route('/sortie', name: 'app_sortie_index')]
    public function index(): Response
    {
        return $this->render('sortie_recente/index.html.twig', [
            'controller_name' => 'SortieRecenteController',
        ]);
    }
}
