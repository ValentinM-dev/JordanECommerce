<?php

namespace App\Controller\Admin;

use App\Entity\Basket;
use App\Entity\Vetement;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(BasketCrudController::class)->generateUrl();

        return $this->redirect($url);

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // 1.1) If you have enabled the "pretty URLs" feature:
        return $this->redirectToRoute('admin_user_index');
        
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('JordanECommerce');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Back to the website', 'fas fa-home', 'app_home');
        yield MenuItem::linkToCrud('Vetement', 'fas fa-list', Vetement::class);
        yield MenuItem::linkToCrud('Basket', 'fas fa-list', Basket::class);
    }
}
