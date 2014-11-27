<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Test\PollBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Test\PollBundle\Entity\Test;
use Test\PollBundle\Entity\Question;
use Test\PollBundle\Form\TestType;
use Test\PollBundle\Entity\UserAnswerPaper;
use Test\PollBundle\Entity\TestProcessor;
use Test\PollBundle\Form\UserAnswerPaperType;
/**
 * Test controller.
 */
class TestController extends Controller
{
    /**
     * Show a Test entry
     */
 /*   public function showAction($test_id)
    {
        $em = $this->getDoctrine()->getManager();

        $test = $em->getRepository('TestPollBundle:Test')->find($test_id);

        if (!$test) {
            throw $this->createNotFoundException('Unable to find the Test.');
        }
        
        $questions = $em->getRepository('TestPollBundle:Question')
                   ->getQuestionsForTest($test->getId());
        
        
        $answers = $em->getRepository('TestPollBundle:Answer')->getAnswersForQuestion($questions);
       

        return $this->render('TestPollBundle:Test:show.html.twig', array(
            'test'      => $test,
            'questions' => $questions,
            'answers'   => $answers,
        ));
    }
    */
    
    public function showAction($test_id, Request $request)
    {
//        $user = $this->get('security.context')->getToken()->getUser();
//        $userId = $user->getId();
//        
//        $test = $this->getTest($test_id);
//        
//        $em = $this->getDoctrine()
//                   ->getEntityManager();
//        $test->setQuestions($em);
//        $test->setAnswerOptions($em);
//        $test->setCorrectAnswers();
//           
//        
//        $answerPaper = new UserAnswerPaper ($test_id, $userId);
//        $answerPaper->setAnswerPaper($test);
//        //$answerPaper->setUserAnswers();
        $em = $this->getDoctrine()
                   ->getManager();
        
        $test = $this->getTest($test_id);
        $test->setQuestionsAndOptions($em);
        
        $answerPaper = new UserAnswerPaper ($test, $this->get('security.context'));
               
        $form = $this->createForm(new UserAnswerPaperType, $answerPaper, array ('attr'=>array('answerPaper'=>$answerPaper)));
  
        $form->handleRequest($request);
       
        if ($form->isValid()) 
        {
           
            
            $answerPaper->setResult($test->checkOnSubmit($answerPaper));
            
            $em->persist($answerPaper);           
            $em->flush();
            return $this->forward('TestPollBundle:Test:test_submitted', array('answerPaper'=>$answerPaper));            
        }
        
            
            
        return $this->render('TestPollBundle:Test:testform.html.twig', array(
            'test' => $test,
            'submittedTest' => $test,
            'form'   => $form->createView()
        ));
    }
    
    
    
    
    public function test_submittedAction ($answerPaper = false) 
    {

           
            return $this->render('TestPollBundle:Test:test_submitted.html.twig', array('answerPaper'=>$answerPaper));
       
    }
        
    protected function getTest($test_id)
    {
        $em = $this->getDoctrine()
                    ->getManager();

        $test = $em->getRepository('TestPollBundle:Test')->find($test_id);

        if (!$test) {
            throw $this->createNotFoundException('Unable to find the Test #'.$testId.'.');
        }

        return $test;
    }
    
    public function submittedAction ()
    {
        return $this->render('TestPollBundle:Test:test_submitted.html.twig');
    }
}
