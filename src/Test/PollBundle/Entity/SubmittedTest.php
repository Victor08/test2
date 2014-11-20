<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Test\PollBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;


/**
 * @ORM\Entity(repositoryClass="Test\PollBundle\Entity\Repository\AnswerRepository")
 * @ORM\Table(name="submittedTests")
 * @ORM\HasLifecycleCallbacks
 */
Class SubmittedTest 
{
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", unique=true)
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
    
    /**
     * @ORM\Column(type="array")
     */
    protected $userAnswers;
    
    
    /**
     * @ORM\Column(type="datetime")
     */
    protected $date;
    
    
    
    
    
    
    

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
     * @return SubmittedTest
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
     * @return SubmittedTest
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
     * @return SubmittedTest
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

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return SubmittedTest
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }
    
  /*  public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('user', new NotBlank(array(
            'message' => 'You must enter your name'
        )));
        $metadata->addPropertyConstraint('comment', new NotBlank(array(
            'message' => 'You must enter a comment'
        )));
    }
   
   */
}
