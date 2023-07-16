<?php

namespace App\Controller;

use App\Entity\Category;
use App\Service\ArticleService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/category',
    name: 'category')]
class CategoryController extends AbstractController
{
    #[Route('/{slug}',
        name: '_show')]
    public function show(
        ?Category $category,
        ArticleService $articleService
    ): Response
    {
        if(!$category) {
            return $this->redirect('home_index');
        }
        return $this->render('category/show.html.twig',
            [
                'category' => $category,
                'articles' => $articleService->getPaginatedArticles($category),
            ]
        );
    }
}
