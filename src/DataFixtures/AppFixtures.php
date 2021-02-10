<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Tag;
use App\Entity\User;
use App\Entity\Project;
use App\Entity\Category;
use App\Entity\Training;
use App\Entity\ImageProject;
use App\Entity\ImageTraining;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder) {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {

        $faker = Factory::create('FR-fr');

        //Gestion des utilisateurs
        //Tableau pour l'id des utilisateurs (article et project)
        $users = [];
        //Tableau pour l'avatar des utilisateurs
        $genres = ['male', 'female'];

        for($i = 1; $i <=10; $i++) {
            $user = new User();

            $genre = $faker->randomElement($genres);

            $picture = 'https://randomuser.me/api/portraits/';
            $pictureId = $faker->numberBetween(1, 99) . '.jpg';

            $picture .= ($genre == 'male' ? 'men/' : 'women/') . $pictureId;

            $hash = $this->encoder->encodePassword($user, 'password');

            $user->setFirstName($faker->firstname($genre))
                 ->setLastName($faker->Lastname)
                 ->setEmail($faker->email)
                 ->setIntroduction($faker->sentence())
                 ->setDescription('<p>' . join('</p><p>', $faker->paragraphs(3)) . '</p>')
                 ->setHash($hash)
                 ->setPicture($picture);
                 
            $manager->persist($user);
            $users[] = $user;
        }

        //Gestion des articles
        for($i = 1; $i <= 10; $i++ ) {
            $training = new Training();

            $title = $faker->sentence();
            $introduction = $faker->paragraph(5);
            $content = '<p>' . join('</p><p>', $faker->paragraphs(5)) . '</p>';
            $coverImage = $faker->imageUrl(250, 150);

            $user = $users[mt_rand(0, count($users) - 1)];

            $training->setTitle($title)
                    ->setIntroduction($introduction)
                    ->setContent($content)
                    ->setCoverImage($coverImage)
                    ->setAuthor($user);

            for ($j = 1; $j <= mt_rand(2,5); $j++) {
               $image = new ImageTraining(); 

               $image->setUrl($faker->imageUrl())
                     ->setCaption($faker->sentence())
                     ->setTraining($training);

                $manager->persist($image);
            }
            
            $manager->persist($training);
        }

        //Gestion des projets
        for($i = 1; $i <= 10; $i++ ) {
            $project = new Project();

            $title = $faker->sentence();
            $introduction = $faker->paragraph(2);
            $content = '<p>' . join('</p><p>', $faker->paragraphs(5)) . '</p>';
            $coverImage = $faker->imageUrl(250, 150);

            $user = $users[mt_rand(0, count($users) - 1)];

            $project->setTitle($title)
                    ->setIntroduction($introduction)
                    ->setContent($content)
                    ->setCoverImage($coverImage)
                    ->setAuthor($user);


            for ($j = 1; $j <= mt_rand(2,5); $j++) {
                $image = new ImageProject(); 
         
                $image->setUrl($faker->imageUrl())
                      ->setCaption($faker->sentence())
                      ->setProject($project);
         
                $manager->persist($image);
            }
            
            $manager->persist($project);
        }

        //Gestion des catégories
        for($i = 1; $i <= 10; $i++ ) {
            $category = new Category();

            $name = $faker->sentence(1);
            $colors = $faker->hexcolor();
            $coverImage = $faker->imageUrl(250, 150);
            $introduction = $faker->paragraph(2);

            $category->setName($name)
                     ->setColors($colors)
                     ->setIntroduction($introduction)
                     ->setCoverImage($coverImage);
            
            $manager->persist($category);
        }

        //Gestion des tags
        for($i = 1; $i <= 10; $i++ ) {
            $tag = new Tag();

            $name = $faker->sentence(1);
            $colors = $faker->hexcolor();
            $coverImage = $faker->imageUrl(250, 150);
            $introduction = $faker->paragraph(2);

            $tag->setName($name)
                     ->setColors($colors)
                     ->setIntroduction($introduction)
                     ->setCoverImage($coverImage);
            
            $manager->persist($tag);
        }

        $manager->flush();
    }
}