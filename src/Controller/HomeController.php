<?php

namespace App\Controller;

use App\Entity\Option;
use App\Entity\User;
use App\Form\Type\WelcomeType;
use App\Repository\CategoryRepository;
use App\Service\ArticleService;
use App\Service\OptionService;
use Doctrine\DBAL\Types\TextType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use WelcomeModel;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home_index')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    #[Route('/show', name: 'home_show')]
    public function show(
        ArticleService $articleService,
        CategoryRepository $categoryRepository,
    ): Response
    {
        return $this->render('home/show.html.twig',
        [
            'articles' => $articleService->getPaginatedArticles(),
            'categories' => $categoryRepository->findAll(),
        ]);
    }

//    #[Route('/welcome',
//        name: 'home_welcome')]
//    public function welcome(
//        Request $request,
//        EntityManagerInterface $entityManager,
//        UserPasswordHasherInterface $userPasswordHasher,
//        OptionService $optionService,
//    ): Response
//    {
//        if ($optionService->getValue(WelcomeModel::SITE_INSTALLED_NAME)) {
//            return $this->redirectToRoute('home_index');
//        }
//        $welcomeForm = $this->createForm(WelcomeType::class, new WelcomeModel());
//        $welcomeForm->handleRequest($request);
//
//        if ($welcomeForm->isSubmitted() && $welcomeForm->isValid()) {
//            /**
//             * @var WelcomeModel $data
//             */
//            $data = $welcomeForm->getData();
//            $siteTitle = new Option(WelcomeModel::SITE_TITLE_LABEL, WelcomeModel::SITE_TITLE_NAME, $data->getSiteTitle(), TextType::class);
//            $siteInstalled = new Option(WelcomeModel::SITE_INSTALLED_LABEL, WelcomeModel::SITE_INSTALLED_NAME, true, null);
//
//            $user = new User($data->getUsername());
//            $user->setRoles(['ROLE_ADMIN']);
//            $user->setPassword($userPasswordHasher->hashPassword($user, $data->getPassword()));
//
//            $entityManager->persist($siteTitle);
//            $entityManager->persist($siteInstalled);
//            $entityManager->persist($user);
//            $entityManager->flush();
//
//            return $this->redirectToRoute('home_index');
//        }
//
//        return $this->render('home/welcome.html.twig',
//            [
//                'form' => $welcomeForm->createView()
//            ]
//        );
//    }
}
