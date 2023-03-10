<?php

namespace App\Controller\Admin;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Admin\MarcaCrudController;
use App\Controller\Admin\ProductoCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use App\Entity\Marca;
use App\Entity\Producto;
use App\Entity\Proveedor;
use App\Entity\Presentacion;
use App\Entity\Zona;
use App\Entity\Users;


class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);

       return $this->redirect($routeBuilder->setController(ProductoCrudController::class)->generateUrl());


        // you can also redirect to different pages depending on the current user
      /*   if ('jane' === $this->getUser()->getUsername()) {
            return $this->redirect('...');
        } */

        // you can also render some template to display a proper Dashboard
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('SfApp');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Users', 'fas fa-user',Users::class); 
        yield MenuItem::linkToCrud('Producto', 'fas fa-box-open',Producto::class);
        yield MenuItem::linkToCrud('Marca', 'fas fa-list',Marca::class); 
        yield MenuItem::linkToCrud('Proveedor', 'fas fa-truck',Proveedor::class); 
        yield MenuItem::linkToCrud('Presentacion', 'fas fa-industry',Presentacion::class); 
        yield MenuItem::linkToCrud('Zona', 'fas fa-map-marker-alt',Zona::class); 
    }
}
