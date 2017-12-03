<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class LoadPostData implements FixtureInterface
{
    
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        
        for($i=0; $i<=1000; $i++)
        {
           $post = new \AppBundle\Entity\Post();
           $post->setTitle($faker->sentence(3));
           $post->setLead($faker->text(300));
           $post->setContent($faker->text(700));
           $post->setCreatedAt($faker->dateTimeThisMonth);
           
           $manager->persist($post);
        }
        
        $manager->flush();
    }
}