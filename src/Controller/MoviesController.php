<?php

namespace App\Controller;

use App\Entity\Movie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

    // GET ALL MOVIES
    #[Route('/movies', name: 'app_movies', methods: ['GET', 'HEAD'])]
    public function index(): Response
    {
        $movies = $this->entityManager->getRepository(Movie::class)->findAll();
        return $this->render('movies/index.html.twig', [
            'movies' => $movies,
        ]);
    }

    // GET ONE MOVIE BY THEIR ID
    #[Route('/movies/{id}', name: 'app_movie', methods: ['GET', 'HEAD'])]
    public function show(int $id): Response
    {
        $movie = $this->entityManager->getRepository(Movie::class)->find($id);
        if (!$movie) {
            throw $this->createNotFoundException('Movie not found' . $id);
        }
        return $this->render('movies/show.html.twig', [
            'movie' => $movie,
        ]);
    }
}
