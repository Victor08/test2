<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Test\PollBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Test controller.
 */
class TestController extends Controller
{
    /**
     * Show a Test entry
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $test = $em->getRepository('TestPollBundle:Test')->find($id);

        if (!$test) {
            throw $this->createNotFoundException('Unable to find the Test.');
        }

        return $this->render('TestPollBundle:Test:show.html.twig', array(
            'test'      => $test,
        ));
    }
}
