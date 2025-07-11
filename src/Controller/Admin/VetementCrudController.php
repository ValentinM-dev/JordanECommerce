<?php

namespace App\Controller\Admin;

use App\Entity\Vetement;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class VetementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vetement::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            TextField::new('image'),
            IntegerField::new('prix'),
            TextField:: new('taille'),
            IntegerField:: new('stock'),
        ];
    }
}
