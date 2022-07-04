<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProjectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Project::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextareaField::new('description')->hideOnIndex(),
            // Calcule le slug à partir du champs passé en paramètre
            SlugField::new('slug')->setTargetFieldName('title')->hideOnIndex(),
            // Upload l'image une seule fois lors de la création
            TextField::new('imageFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
            // Permet d'afficher la miniature
            ImageField::new('file')->setBasePath($this->getParameter('aws_image_path'))->onlyOnIndex(),
            TextField::new('github'),
            AssociationField::new('category'),
        ];
    }

    // Affiche le dernier projet uploadé en premier dans la liste
    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setDefaultSort(['createdAt' => 'DESC']);
    }
    
}
