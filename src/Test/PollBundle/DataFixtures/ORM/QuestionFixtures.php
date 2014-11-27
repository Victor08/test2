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
use Test\PollBundle\Entity\Question;


class QuestionFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $question1 = new Question();
        $question1->setTitle('01 whats the weather like today?');
        $question1->setType(3);
        $question1->setTestId($manager->merge($this->getReference('test-1')));
        $manager->persist($question1);
        
        
        $question2 = new Question();
        $question2->setTitle('02 whats the weather like today?');
        $question2->setType(1);
        $question2->setTestId($manager->merge($this->getReference('test-1')));
        $manager->persist($question2);
        

        
        $question3 = new Question();
        $question3->setTitle('03 whats the weather like today?');
        $question3->setType(2);
        $question3->setTestId($manager->merge($this->getReference('test-1')));
        $manager->persist($question3);
        
        $question4 = new Question();
        $question4->setTitle('04 whats the weather like today?');
        $question4->setType(1);
        $question4->setTestId($manager->merge($this->getReference('test-2')));

        $manager->persist($question4);
        
        $question5 = new Question();
        $question5->setTitle('05 whats the weather like today?');
        $question5->setType(1);
        $question5->setTestId($manager->merge($this->getReference('test-2')));

        $manager->persist($question5);
        
        $question6 = new Question();
        $question6->setTitle('06 whats the weather like today?');
        $question6->setType(2);
        $question6->setTestId($manager->merge($this->getReference('test-2')));

        $manager->persist($question6);
        
        $question7 = new Question();
        $question7->setTitle('07 whats the weather like today?');
        $question7->setType(1);
        $question7->setTestId($manager->merge($this->getReference('test-3')));

        $manager->persist($question7);
        
        $question8 = new Question();
        $question8->setTitle('08 whats the weather like today?');
        $question8->setType(2);
        $question8->setTestId($manager->merge($this->getReference('test-3')));

        $manager->persist($question8);
        
        $question9 = new Question();
        $question9->setTitle('09 whats the weather like today?');
        $question9->setType(1);
        $question9->setTestId($manager->merge($this->getReference('test-4')));

        $manager->persist($question9);
        
        $question10 = new Question();
        $question10->setTitle('101 whats the weather like today?');
        $question10->setType(2);
        $question10->setTestId($manager->merge($this->getReference('test-4')));

        $manager->persist($question10);
        
        $question11 = new Question();
        $question11->setTitle('1101 whats the weather like today?');
        $question11->setType(2);
        $question11->setTestId($manager->merge($this->getReference('test-4')));

        $manager->persist($question11);
        
        $question12 = new Question();
        $question12->setTitle('1201 whats the weather like today?');
        $question12->setType(1);
        $question12->setTestId($manager->merge($this->getReference('test-4')));

        $manager->persist($question12);
        
        $question13 = new Question();
        $question13->setTitle('01 whats the weather like today?');
        $question13->setType(1);
        $question13->setTestId($manager->merge($this->getReference('test-4')));

        $manager->persist($question13);
        
        $manager->flush();
        $this->addReference('q-1', $question1);
        $this->addReference('q-2', $question2);
        $this->addReference('q-3', $question3);



    }

        
    public function getOrder()
    {
        return 2;
    }
    
}