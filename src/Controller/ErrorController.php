<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\ErrorHandler\Exception\FlattenException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class ErrorController extends AbstractController
{
    public function show(
        FlattenException $exception,
        Environment $environment,
    ): Response
    {
        $view = "bundles/TwigBundles/Exception/error{$exception->getStatusCode()}.html.twig";

        if (!$environment->getLoader()->exists($view)) {
            $view = "bundles/TwigBundles/Exception/error.html.twig";
        }

        return $this->render($view);
    }
}