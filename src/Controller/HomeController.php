<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Service\CartService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EntityManagerInterface $em, CartService $cartService): Response
    {
        $produits = $em->getRepository(Article::class)->findAll();
        $cartItems = $cartService->getCart();
        $total = $cartService->getTotal();


        return $this->render('home/home.html.twig', [
            'produit' => $produits,
            'cart' => $cartItems,
            'total' => $total,
        ]);
    }

    
}
