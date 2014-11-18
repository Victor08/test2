<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Test\PollBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Test\PollBundle\Entity\Test;


class TestFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $test1 = new Test();
        $test1->setTitle('Brain trainer Symfony2');
        $test1->setAuthor('Somebody');
        $test1->setCreated(new \DateTime());
        $manager->persist($test1);
        
        $manager->flush();
    }

}