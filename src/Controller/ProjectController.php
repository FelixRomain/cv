<?php

namespace App\Controller;

use App\Repository\TagRepository;
use App\Repository\ProjectRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProjectController extends AbstractController
{
    /**
     * @Route("/project", name="project_index")
     */
    public function index(ProjectRepository $repoProject, CategoryRepository $repoCategory, TagRepository $repoTag): Response
    {

        $projects = $repoProject->findAll();
        $categories = $repoCategory->findAll();
        $tags = $repoTag->findAll();

        return $this->render('home/project/index.html.twig', [
            'controller_name' => 'ProjectController',
            'projects' => $projects,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }
}
