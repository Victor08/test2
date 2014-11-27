<?php
namespace Test\PollBundle\Entity;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Doctrine\Common\Collections\ArrayCollection;
use Test\PollBundle\Entity\UserAnswer;
use Symfony\Component\Validator\Constraints\DateTime;
/**
 * @ORM\Entity(repositoryClass="Test\PollBundle\Entity\Repository\UserAnswerPaperRepository")
 * @ORM\Table(name="userAnswerPapers")
 * @ORM\HasLifecycleCallbacks()
 */
class UserAnswerPaper
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $userId;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $testId;
    

    public function __construct(\Test\PollBundle\Entity\Test $test, \Symfony\Component\Security\Core\SecurityContext  $securityContext) {
        
        $this->userAnswers = array ();
        $this->testId = $test->getId();
        $this->userId = $securityContext->getToken()->getUser()->getId();
        $this->setAnswerPaper($test);
        
    }
    
    
    /**
     * @ORM\Column(type="array")
     */
    protected $userAnswers;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $result;




    protected $answerPaper;
    
    public function setAnswerPaper(\Test\PollBundle\Entity\Test $test) 
    {
        $i=0;
        foreach ($test->getQuestions() as $q) {
            $this->answerPaper[$i]['questionId']=$q->getId();
            $this->answerPaper[$i]['questionTitle']=$q->getTitle();
            $this->answerPaper[$i]['questionType']=$q->getType();
            $answerOptions=$q->getAnswerOptions();          
            foreach ($answerOptions as $a ) {
                $this->answerPaper[$i]['answerOptions'][$a->getQuestionId().'_'.$a->getTitle()]=$a->getTitle();               
            }
            $i++;
        } 
    }
    
    public function getAnswerPaper(){
        return $this->answerPaper;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return UserAnswerPaper
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set testId
     *
     * @param integer $testId
     * @return UserAnswerPaper
     */
    public function setTestId($testId)
    {
        $this->testId = $testId;

        return $this;
    }

    /**
     * Get testId
     *
     * @return integer 
     */
    public function getTestId()
    {
        return $this->testId;
    }


    /**
     * Set userAnswers
     *
     * @param array $userAnswers
     * @return UserAnswerPaper
     */
    public function setUserAnswers($userAnswers)
    {
        $this->userAnswers = $userAnswers;

        return $this;
    }

    /**
     * Get userAnswers
     *
     * @return array 
     */
    public function getUserAnswers()
    {
        return $this->userAnswers;
    }
    
    public function __toString() {
        return 'ololo';
    }

    /**
     * Set result
     *
     * @param integer $result
     * @return UserAnswerPaper
     */
    public function setResult($result)
    {
        $this->result = $result;

        return $this;
    }

    /**
     * Get result
     *
     * @return integer 
     */
    public function getResult()
    {
        return $this->result;
    }
    
   

    
}
