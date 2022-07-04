<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\User;
use App\Entity\Project;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('MiriamSimonnet');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Projects', 'fas fa-newspaper', Project::class);
        yield MenuItem::linkToCrud('Categories', 'fas fa-tags', Category::class);
        yield MenuItem::linkToCrud('Paramètres', 'fas fa-cog', User::class);
    }
}
