<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Movie;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $movie1 = new Movie();
        $movie1->setTitle('The Shawshank Redemption');
        // genre and country are now references to GenreFixtures and CountryFixtures
        $movie1->setCountry($this->getReference('country1'));
        $movie1->setGenre($this->getReference('genre1'));
        $movie1->setBudget(25000000);
        $movie1->setReleaseDate(new \DateTime('1994-09-23'));
        $movie1->setDescription('Andy Dufresne es encarcelado por matar a su esposa y al amante de esta. Tras una dura adaptación, intenta mejorar las condiciones de la prisión y dar esperanza a sus compañeros.');
        $movie1->setRuntime(142);
        $movie1->setPoster('https://image.tmdb.org/t/p/original/1bGBTCPC1lcvrNTluh1bgr1dd2F.jpg');
        $manager->persist($movie1);

        $movie2 = new Movie();
        $movie2->setTitle('The Godfather');
        $movie2->setCountry($this->getReference('country1'));
        $movie2->setGenre($this->getReference('genre6'));
        $movie2->setBudget(6000000);
        $movie2->setReleaseDate(new \DateTime('1972-03-14'));
        $movie2->setDescription('El poderoso Don Vito Corleone es el jefe de una familia de la mafia siciliana. Su hijo Michael ha regresado de la guerra y quiere dedicarse a los negocios de la familia. Pero el clan está amenazado por las ambiciones de otros mafiosos y por la corrupción policial.');
        $movie2->setRuntime(175);
        $movie2->setPoster('https://image.tmdb.org/t/p/original/iUCnFW0HdjVqpixI3tj8Q1cXMoM.jpg');
        $manager->persist($movie2);

        $movie3 = new Movie();
        $movie3->setTitle('The Dark Knight');
        $movie3->setCountry($this->getReference('country1'));
        $movie3->setGenre($this->getReference('genre1'));
        $movie3->setBudget(185000000);
        $movie3->setReleaseDate(new \DateTime('2008-07-16'));
        $movie3->setDescription('Batman se enfrenta a su peor enemigo, el Joker, un criminal psicópata que se dedica a sembrar el caos en Gotham City. El Joker tiene un plan para destruir a Batman y a Gotham, y sólo el Caballero Oscuro puede detenerlo.');
        $movie3->setRuntime(152);
        $movie3->setPoster('https://image.tmdb.org/t/p/original/lHhZrxYk8pi25UYKgHVJSbGCwI9.jpg');
        $manager->persist($movie3);

        $movie4 = new Movie();
        $movie4->setTitle('Whiplash');
        $movie4->setCountry($this->getReference('country1'));
        $movie4->setGenre($this->getReference('genre1'));
        $movie4->setBudget(3300000);
        $movie4->setReleaseDate(new \DateTime('2014-10-10'));
        $movie4->setDescription('Andrew es un joven batería que sueña con entrar en una prestigiosa escuela de música. Para conseguirlo, tendrá que superar a su profesor, un hombre que no duda en humillar a sus alumnos para conseguir el mejor resultado.');
        $movie4->setRuntime(107);
        $movie4->setPoster('https://image.tmdb.org/t/p/original/lHTxDYso04WyDo5x4Vzxgi9EHJN.jpg');
        $manager->persist($movie4);

        $movie5 = new Movie();
        $movie5->setTitle('The Lord of the Rings: The Return of the King');
        $movie5->setCountry($this->getReference('country1'));
        $movie5->setGenre($this->getReference('genre2'));
        $movie5->setBudget(94000000);
        $movie5->setReleaseDate(new \DateTime('2003-12-01'));
        $movie5->setDescription('Gandalf y Aragorn lideran el ejército de hombres y elfos contra las hordas de orcos y la Legión Negra de Sauron. Mientras, Frodo y Sam continúan su viaje hacia Mordor para destruir el Anillo Único.');
        $movie5->setRuntime(201);
        $movie5->setPoster('https://image.tmdb.org/t/p/original/gtxgvnmzhwhUGAWYTNK9hKai3Hk.jpg');
        $manager->persist($movie5);

        $movie6 = new Movie();
        $movie6->setTitle('The Lord of the Rings: The Fellowship of the Ring');
        $movie6->setCountry($this->getReference('country1'));
        $movie6->setGenre($this->getReference('genre2'));
        $movie6->setBudget(93000000);
        $movie6->setReleaseDate(new \DateTime('2001-12-18'));
        $movie6->setDescription('Un joven hobbit llamado Frodo Bolsón recibe de su tío Bilbo un anillo mágico. Éste es un poderoso anillo de poder que fue creado por el malvado Señor Oscuro Sauron. Frodo debe destruirlo en las Montañas Nubladas, donde fue forjado.');
        $movie6->setRuntime(178);
        $movie6->setPoster('https://image.tmdb.org/t/p/original/gU84vBGG2x8K3x1zrz4SggiN5hr.jpg');
        $manager->persist($movie6);

        $manager->flush();
    }
}
