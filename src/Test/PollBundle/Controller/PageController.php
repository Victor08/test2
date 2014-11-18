<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Test\PollBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
        return $this->render('TestPollBundle:Page:index.html.twig');
    }
    
    public function aboutAction()
    {
        return $this->render('TestPollBundle:Page:about.html.twig');
    }
}
