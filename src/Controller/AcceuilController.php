<?php

namespace App\Controller;

use App\Repository\BasketRepository;
use App\Repository\VetementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AcceuilController extends AbstractController
{
    #[Route('/', name: 'app_acceuil')]
    public function index(Request $request,VetementRepository $vetementRepository, BasketRepository $basketRepository): Response
    {
        $type = $request->query->get('type');

        $vetements= [];
        $baskets= [];

        if($type === 'vetement' || $type === null) {
            $vetements = $vetementRepository->findAll();
        }

        if($type === 'basket' || $type === null) {
            $baskets = $basketRepository->findAll();
        }

        return $this->render('acceuil/index.html.twig', [
            'vetements' => $vetements,
            'baskets' => $baskets,
            'type' => $type,
        ]);
    }
}
