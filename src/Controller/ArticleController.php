<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/article',
    name: 'article')]
class ArticleController extends AbstractController
{
    #[Route('/{slug}',
        name: '_show')]
    public function show(
        ?Article $article,
    ): Response
    {
        if (!$article) {
            return $this->redirectToRoute('home_index');
        }
        return $this->render('article/show.html.twig',
            [
                'article' => $article,
            ]
        );
    }
}
