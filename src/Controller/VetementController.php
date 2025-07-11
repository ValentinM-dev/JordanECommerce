<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class VetementController extends AbstractController
{
    #[Route('/vetement', name: 'app_vetement')]
    public function index(): Response
    {
        return $this->render('vetement/.html.twig', [
            'controller_name' => 'VetementController',
        ]);
    }
}
