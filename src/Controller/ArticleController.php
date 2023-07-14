<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Comment;
use App\Form\CommentType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/article',
    name: 'article')]
class ArticleController extends AbstractController
{
    #[Route('/{slug}',
        name: '_show')]
    public function show(
        ?Article $article,
        Request $request,
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
                'commentForm' => $commentForm->createView(),
            ]
        );
    }
}
