<?php

namespace App\Controller;

use App\Repository\TagRepository;
use App\Repository\CategoryRepository;
use App\Repository\TrainingRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TrainingController extends AbstractController
{
    /**
     * @Route("/article", name="training_index")
     */
    public function index(TrainingRepository $repoArticle, CategoryRepository $repoCategory, TagRepository $repoTag): Response
    {

        $articles = $repoArticle->findAll();
        $categories = $repoCategory->findAll();
        $tags = $repoTag->findAll();

        return $this->render('home/training/index.html.twig', [
            'controller_name' => 'TrainingController',
            'articles' => $articles,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /** 
     * Permet d'afficher un seul article
     * 
     * @Route("/article/{slug}", name="training_show")
     * 
     * @return Response
     */
    public function show($slug, TrainingRepository $repo) {
        // Je récupère l'article qui correspong au bon slug
        $article = $repo->findOneBySlug($slug);

        return $this->render('home/training/show.html.twig', [
            'article' => $article
        ]);
    }
}
