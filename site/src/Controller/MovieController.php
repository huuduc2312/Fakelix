<?php

namespace App\Controller;

use App\Entity\Movie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    /**
     * @Route("/movie/{id}/watch", name="app_movie_watch")
     */
    public function watch(Movie $movie): Response
    {
        return $this->render('movie/watch.html.twig', ['movie' => $movie]);
    }
}
