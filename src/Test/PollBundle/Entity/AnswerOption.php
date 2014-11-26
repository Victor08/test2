<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Test\PollBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="Test\PollBundle\Entity\Repository\AnswerOptionRepository")
 * @ORM\Table(name="answerOptions")
 * @ORM\HasLifecycleCallbacks
 */
class AnswerOption 
{
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="boolean")
     */
    protected $correct;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $title;
    
    /**
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="answers")
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id")
     */
    protected $questionId;
    
    /**
     * @ORM\Column(type="boolean")
     */
    protected $approved;
    
    public function __construct()
    {

        $this->setApproved(true);
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
     * Set title
     *
     * @param string $title
     * @return Answer
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    

    /**
     * Set approved
     *
     * @param boolean $approved
     * @return Answer
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;

        return $this;
    }

    /**
     * Get approved
     *
     * @return boolean 
     */
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * Set correct
     *
     * @param boolean $correct
     * @return Answer
     */
    public function setCorrect($correct)
    {
        $this->correct = $correct;

        return $this;
    }

    /**
     * Get correct
     *
     * @return boolean 
     */
    public function getCorrect()
    {
        return $this->correct;
    }

    /**
     * Set questionId
     *
     * @param \Test\PollBundle\Entity\Question $questionId
     * @return AnswerOption
     */
    public function setQuestionId(\Test\PollBundle\Entity\Question $questionId = null)
    {
        $this->questionId = $questionId;

        return $this;
    }

    /**
     * Get questionId
     *
     * @return \Test\PollBundle\Entity\Question 
     */
    public function getQuestionId()
    {
        return $this->questionId;
    }
}
