<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Test\PollBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Test\PollBundle\Entity\SubmittedTest;
use Test\PollBundle\Form\SubmittedTestType;

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
    
    public function showAction($test_id)
    {
        $test = $this->getTest($test_id);

        $submittedTest = new SubmittedTest();
        $submittedTest->setTestId($test_id);
        $form    = $this->createFormBuilder($submittedTest)
                        ->setAction($this->generateUrl('TestPollBundle_test_submitted'))
                        ->setMethod('POST')
                        ->add('userId', 'integer')
                        ->add('testId', 'integer')
                        ->add('date', 'date')
                        ->add('save', 'submit')
                        ->getForm();
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->submit($request);
            if ($form->isValid()) 
            {

                $em = $this->getDoctrine()
                           ->getEntityManager();
                $em->persist($submittedTest);
                $em->flush();


                return $this->redirect($this->generateUrl('TestPollBundle_test_submitted', array(
                    'id' => $submittedTest->getTestId())) .
                    '#submittedTest-' . $submittedTest->getId()
                );
            }
        }
            
            
        return $this->render('TestPollBundle:Test:show.html.twig', array(
            'test' => $test,
            'submittedTest' => $submittedTest,
            'form'   => $form->createView()
        ));
    }
    
    
    
    
    public function test_submittedAction () 
    {

           
            return $this->render('TestPollBundle:Test:test_submitted.html.twig');
       
    }
        
    protected function getTest($test_id)
    {
        $em = $this->getDoctrine()
                    ->getEntityManager();

        $test = $em->getRepository('TestPollBundle:Test')->find($test_id);

        if (!$test) {
            throw $this->createNotFoundException('Unable to find the Test.');
        }

        return $test;
    }
    
    public function submittedAction ()
    {
        return $this->render('TestPollBundle:Test:test_submitted.html.twig');
    }
}
