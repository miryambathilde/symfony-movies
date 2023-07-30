<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Form\MovieType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    // CREATE A NEW MOVIE
    #[Route('/movies/new', name: 'app_movie_new', methods: ['GET', 'POST'])]
    public function create(Request $request): Response
    {
        $movie = new Movie();
        $form = $this->createForm(MovieType::class, $movie);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($movie);
            $this->entityManager->flush();
            return $this->redirectToRoute('app_movie', ['id' => $movie->getId()]);
        }
        return $this->render('movies/new.html.twig', [
            'form' => $form->createView(),
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

    // EDIT A MOVIE
    #[Route('/movies/{id}/edit', name: 'app_movie_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, int $id): Response {
        // get the movie by id
        $movie = $this->entityManager->getRepository(Movie::class)->find($id);
        // if the movie doesn't exist, throw an exception
        if (!$movie) {
            throw $this->createNotFoundException('Movie not found' . $id);
        }
        // if the movie exists, create a form to edit it
        $form = $this->createForm(MovieType::class, $movie);
        // handle the request and check if the form is valid
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($movie);
            $this->entityManager->flush();
            return $this->redirectToRoute('app_movie', ['id' => $movie->getId()]);
        }
        // if the form is not valid, render the form again
        return $this->render('movies/edit.html.twig', [
            'form' => $form->createView(),
            'movie' => $movie,
        ]);
    }
}
