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
use Test\PollBundle\Entity\AnswerOption;

class AnswerOptionFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $answer = new AnswerOption();
        $answer->setTitle('01 bla bla');
        $answer->setCorrect("ololo");
        $answer->setQuestionId($this->getReference('q-1'));

        $manager->persist($answer);
        
        $answer = new AnswerOption();
        $answer->setTitle('02 bla bla');
        $answer->setCorrect(false);
        $answer->setQuestionId($this->getReference('q-1'));

        $manager->persist($answer);
        
        $answer = new AnswerOption();
        $answer->setTitle('03 bla bla');
        $answer->setCorrect(true);
        $answer->setQuestionId($this->getReference('q-1'));

        $manager->persist($answer);
        
        $answer = new AnswerOption();
        $answer->setTitle('01 bla bla');
        $answer->setCorrect(false);
        $answer->setQuestionId($this->getReference('q-1'));

        $manager->persist($answer);
        
        $answer = new AnswerOption();
        $answer->setTitle('04 bla bla');
        $answer->setCorrect(false);
        $answer->setQuestionId($this->getReference('q-2'));

        $manager->persist($answer);
        
        $answer = new AnswerOption();
        $answer->setTitle('05 bla bla');
        $answer->setCorrect(true);
        $answer->setQuestionId($this->getReference('q-2'));

        $manager->persist($answer);
        
        $answer = new AnswerOption();
        $answer->setTitle('06 bla bla');
        $answer->setCorrect(false);
        $answer->setQuestionId($this->getReference('q-2'));

        $manager->persist($answer);
        
        $answer = new AnswerOption();
        $answer->setTitle('07 bla bla');
        $answer->setCorrect(false);
        $answer->setQuestionId($this->getReference('q-3'));

        $manager->persist($answer);
        
        $answer = new AnswerOption();
        $answer->setTitle('08 bla bla');
        $answer->setCorrect(false);
        $answer->setQuestionId($this->getReference('q-3'));

        $manager->persist($answer);
        
        $answer = new AnswerOption();
        $answer->setTitle('09 bla bla');
        $answer->setCorrect(true);
        $answer->setQuestionId($this->getReference('q-3'));

        $manager->persist($answer);
        
        
        $answer = new AnswerOption();
        $answer->setTitle('10 bla bla');
        $answer->setCorrect(false);
        $answer->setQuestionId($this->getReference('q-3'));

        $manager->persist($answer);
        
        $manager->flush();
    }

        
    public function getOrder()
    {
        return 3;
    }
}
        