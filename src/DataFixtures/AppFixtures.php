<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Tag;
use App\Entity\Project;
use App\Entity\Category;
use App\Entity\Training;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker = Factory::create('FR-fr');

        for($i = 1; $i <= 10; $i++ ) {
            $training = new Training();

            $title = $faker->sentence();
            $introduction = $faker->paragraph(2);
            $content = '<p>' . join('</p><p>', $faker->paragraphs(5)) . '</p>';
            $coverImage = $faker->imageUrl(250, 150);

            $training->setTitle($title)
                    ->setIntroduction($introduction)
                    ->setContent($content)
                    ->setCoverImage($coverImage)
                    ->setSlug("titre-de-l-article-n-$i");
            
            $manager->persist($training);
        }

        for($d = 1; $d <= 10; $d++ ) {
            $project = new Project();

            $title = $faker->sentence();
            $introduction = $faker->paragraph(2);
            $content = '<p>' . join('</p><p>', $faker->paragraphs(5)) . '</p>';
            $coverImage = $faker->imageUrl(250, 150);

            $project->setTitle($title)
                    ->setIntroduction($introduction)
                    ->setContent($content)
                    ->setCoverImage($coverImage)
                    ->setSlug("titre-de-l-article-n-$d");
            
            $manager->persist($project);
        }


        for($j = 1; $j <= 10; $j++ ) {
            $category = new Category();

            $name = $faker->sentence(1);
            $colors = $faker->hexcolor();
            $coverImage = $faker->imageUrl(250, 150);
            $introduction = $faker->paragraph(2);

            $category->setName($name)
                     ->setColors($colors)
                     ->setSlug("titre-de-l-article-n-$j")
                     ->setIntroduction($introduction)
                     ->setCoverImage($coverImage);
            
            $manager->persist($category);
        }

        for($c = 1; $c <= 10; $c++ ) {
            $tag = new Tag();

            $name = $faker->sentence(1);
            $colors = $faker->hexcolor();
            $coverImage = $faker->imageUrl(250, 150);
            $introduction = $faker->paragraph(2);

            $tag->setName($name)
                     ->setColors($colors)
                     ->setSlug("titre-de-l-article-n-$c")
                     ->setIntroduction($introduction)
                     ->setCoverImage($coverImage);
            
            $manager->persist($tag);
        }

        $manager->flush();
    }
}