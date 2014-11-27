<?php
namespace Test\PollBundle\Entity;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class TestProcessor 
{
    protected $id;    
    
    protected $correctAnswers;
    
    protected $questions;


    static public function checkTest ($answerPaperId){
        $em = $this->getDoctrine()
                   ->getEntityManager();

        $userAnswerPaper = $em->getRepository('TestPollBundle:UserAnswerPaper')->find($answerPaperId);
        $userAnswers = self::toFlatArray($userAnswerPaper->getUserAnswers());
        $test = $em->getRepository('TestPollBundle:Test')->find($userAnswerPaper->getTestId());
        $correctAnswers = self::toFlatArray($test->getCorrectAnswers());

        return self::check($correctAnswers, $userAnswers);
    }
    
    public function checkOnSubmit (\Test\PollBundle\Entity\UserAnswerPaper $userAnswerPaper){
        $userAnswers = self::toFlatArray($userAnswerPaper->getUserAnswers());
        $correctAnswers = self::toFlatArray($this->correctAnswers);
        return self::check($correctAnswers, $userAnswers);

    }

    static public function check($correctAnswers, $userAnswers) {
        $correctSum = count($correctAnswers);
        $userSum = 0;
        foreach ($userAnswers as $ua) {
            if (in_array($ua, $correctAnswers)){
                $userSum++;
            } else {
                $userSum--;
            }   
        }
        $result = round(($userSum/$correctSum)*100, 1);
        if ($result < 0) {$result = 0;}
        return $result;
    } 
    
    static public function toFlatArray (array $array){
        $result = array();
        array_walk_recursive($array, function($a) use (&$result) { $result[] = $a; });
        return $result;
    }

    public function setCorrectAnswers ()            
    {
        $result = array();
        foreach ($this->questions as $q) {
            foreach ($q->getAnswerOptions() as $a){
                if ($q->getType()==1 or $q->getType() == 2 ){
                    if ($a->getCorrect()==1){
                        $result[] = $q->getId() .'_'. $a->getTitle();  
                    }
                } else if ($q->getType() == 3) {
                    $result[] = $q->getId().'_'.$a->getCorrect();
                }
            }          
        } 
        $this->correctAnswers = $result;
    }






}
