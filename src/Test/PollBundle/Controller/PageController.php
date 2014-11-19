<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Test\PollBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Test\PollBundle\Entity\Enquiry;
use Test\PollBundle\Form\EnquiryType;


class PageController extends Controller
{
    public function indexAction()
    {
        
        $em = $this->getDoctrine()
                   ->getManager();

        $tests = $em->getRepository('TestPollBundle:Test')
                    ->getTests();

        return $this->render('TestPollBundle:Page:index.html.twig', array(
            'tests' => $tests
        ));
    
    }
    
    public function aboutAction()
    {
        return $this->render('TestPollBundle:Page:about.html.twig');
    }
    
    public function contactAction()
{
    $enquiry = new Enquiry();
    $form = $this->createForm(new EnquiryType(), $enquiry);

    $request = $this->getRequest();
    if ($request->getMethod() == 'POST') {
        $form->submit($request);

        if ($form->isValid()) {
            // Perform some action, such as sending an email

            // Redirect - This is important to prevent users re-posting
            // the form if they refresh the page
            return $this->redirect($this->generateUrl('TestPollBundle_contact'));
        }
    }

    return $this->render('TestPollBundle:Page:contact.html.twig', array(
        'form' => $form->createView()
    ));
}
}
