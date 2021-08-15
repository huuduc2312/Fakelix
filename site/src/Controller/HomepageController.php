<?php

namespace App\Controller;

use App\Entity\Movie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function __invoke(EntityManagerInterface $em): Response
    {
        $movieRepo = $em->getRepository(Movie::class);
        $movies = $movieRepo->findAll();

        return $this->render('homepage.html.twig', ['movies' => $movies]);
    }
}
