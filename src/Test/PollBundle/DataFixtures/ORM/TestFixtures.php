<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Test\PollBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Test\PollBundle\Entity\Test;


class TestFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $test1 = new Test();
        $test1->setTitle('111 Brain trainer Symfony2');
        $test1->setAuthor('Somebody');
        $test1->setCreated(new \DateTime());
        $test1->setDescription('11111');
        $manager->persist($test1);
        
        $test2 = new Test();
        $test2->setTitle('222 Brain trainer Symfony2');
        $test2->setAuthor('Somebody');
        $test2->setCreated(new \DateTime());
        $test2->setDescription('11111');
        $manager->persist($test2);
        
        
        $test3 = new Test();
        $test3->setTitle('333 Brain trainer Symfony2');
        $test3->setAuthor('Somebody');
        $test3->setCreated(new \DateTime());
        $test3->setDescription('11111');
        $manager->persist($test3);
        
        
        $test4 = new Test();
        $test4->setTitle('444 Brain trainer Symfony2');
        $test4->setAuthor('Somebody');
        $test4->setCreated(new \DateTime());
        $test4->setDescription('11111');
        $manager->persist($test4);
        
        $manager->flush();
        
        $this->addReference('test-1', $test1);
        $this->addReference('test-2', $test2);
        $this->addReference('test-3', $test3);
        $this->addReference('test-4', $test4);
    }
    
    public function getOrder()
    {
        return 1;
    }

}