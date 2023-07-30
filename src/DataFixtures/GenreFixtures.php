<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Genre;

class GenreFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Instanciate a new Genre object
        $genre1 = new Genre();
        // Set the name property of the Genre object
        $genre1->setName('Action');
        // Persist the Genre object to the database
        $manager->persist($genre1);

        $genre2 = new Genre();
        $genre2->setName('Adventure');
        $manager->persist($genre2);

        $genre3 = new Genre();
        $genre3->setName('Animation');
        $manager->persist($genre3);

        $genre4 = new Genre();
        $genre4->setName('Horror');
        $manager->persist($genre4);

        $genre5 = new Genre();
        $genre5->setName('Comedy');
        $manager->persist($genre5);

        $genre6 = new Genre();
        $genre6->setName('Crime');
        $manager->persist($genre6);

        // Flush the Genre object to the database
        $manager->flush();

        // add references to be able to use these objects in other fixtures by using their reference names
        $this->addReference('genre1', $genre1);
        $this->addReference('genre2', $genre2);
        $this->addReference('genre3', $genre3);
        $this->addReference('genre4', $genre4);
        $this->addReference('genre5', $genre5);
        $this->addReference('genre6', $genre6);
    }
}
