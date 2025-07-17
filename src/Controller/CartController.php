<?php

namespace App\Controller;

use App\Service\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CartController extends AbstractController
{
    #[Route('/cart', name: 'app_cart')]
    public function index(CartService $cartService): Response
    {
        $cartItems = $cartService->getDetailedCart();
        $total = $cartService->getTotal();

        return $this->render('cart/cart.html.twig', [
            'cartItems' => $cartItems,
            'total' => $total,
        ]);
    }

    #[Route('/cart/clear', name: 'cart_clear')]
    public function clear(CartService $cartService): Response
    {
        $cartService->clearCart();
        return $this->redirectToRoute('app_cart');
    }
}
