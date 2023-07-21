<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ColorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Category::class;
    }


    public function configureFields(string $pageName): iterable
    {

        yield TextField::new('name');
        yield SlugField::new('slug')->setTargetFieldName('name');
        yield ImageField::new('icon')
            ->setBasePath('/images') // Chemin relatif depuis la racine du dossier "public" vers le dossier des images
            ->setUploadDir('public/images') // Chemin absolu vers le dossier d'upload des images
            ->setUploadedFileNamePattern('[randomhash].[extension]') // Patron de nom de fichier pour les images uploadées
            ->setRequired(false); // Optionnel : si l'image n'est pas requise, tu peux définir cette option à false
        yield ColorField::new('color');
    }

}
