<?php

namespace App\Controller\Admin;

use App\Entity\Producto;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class ProductoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Producto::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            //IdField::new('id'),
            IdField::new('codigo'),
            TextField::new('descripcion_producto'),
            TextField::new('precio'),
            TextField::new('stock'),
            TextField::new('iva'),
            TextField::new('peso'),
            AssociationField::new('marca'),
            AssociationField::new('proveedor'),
            AssociationField::new('presentacion'),
            AssociationField::new('zona')
            //TextEditorField::new('description'),
        ];
    }
   
    public function reportePdfAction(): Response
    {
        $productos = $this->getDoctrine()->getRepository(Producto::class)->findAll();

        $html = $this->renderView('/reporte_pdf.html.twig', [
            'productos' => $productos,
        ]);

        return new PdfResponse(
            $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
            'reporte_productos.pdf'
        );
    }

}
