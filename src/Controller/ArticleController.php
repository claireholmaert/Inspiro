<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Comment;
use App\Form\Type\CommentType;
use App\Service\CommentService;
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
        CommentService $commentService,
    ): Response
    {
        if (!$article) {
            return $this->redirectToRoute('home_index');
        }

        $comment = new Comment($article);
        $commentForm = $this->createForm(CommentType::class, $comment);

        return $this->render('article/show.html.twig',
            [
                'article' => $article,
                'comments' => $commentService->getPaginatedComments($article),
                'commentForm' => $commentForm->createView(),
            ]
        );
    }
}
