<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/category',
    name: 'category')]
class CategoryController extends AbstractController
{
    #[Route('/{slug}',
        name: '_show')]
    public function show(): Response
    {
        return $this->render('category/show.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }
}
