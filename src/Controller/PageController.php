<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/page',
    name: 'page')]
class PageController extends AbstractController
{
    #[Route('/{slug}',
        name: '_show')]
    public function show(): Response
    {
        return $this->render('page/show.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }
}
