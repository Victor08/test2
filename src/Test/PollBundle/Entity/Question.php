<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Test\PollBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;

/**
 * @ORM\Entity(repositoryClass="Test\PollBundle\Entity\Repository\QuestionRepository")
 * @ORM\Table(name="question")
 * @ORM\HasLifecycleCallbacks
 */
class Question
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @ORM\Column(type="integer")
     */
    protected $type;

   

    /**
     * @ORM\ManyToOne(targetEntity="Test", inversedBy="questions")
     * @ORM\JoinColumn(name="test_id", referencedColumnName="id")
     */
    protected $testId;
    
    /**
     * @ORM\OneToMany(targetEntity="AnswerOption", mappedBy="questionId")
     */
    protected $answerOptions;

    public function __construct()
    {
        
        $this->answerOptions = new ArrayCollection();
     //   $this->setAnswerOptions($em);
     //   $this->setChoiceList();
    }

//    
//    protected $choiceList;
//    public function setChoiceList()
//    {
//        
//        $answerIds = array();
//        $answerTitles = array ();
//        foreach ($this->answerOptions as $option)
//        {
//            $answerIds[] = $option->getId();
//            $answerTitles[] = $option->getTitle();
//        }
//        $this->choiceList = new ChoiceList ($answerIds, $answerTitles);
//                
//    }
//    public function getChoiceList() 
//    {
//        if ($this->choiceList) 
//        { 
//            return $this->сhoiceList;
//        } else {
//            $this->setChoiceList();
//            return $this->сhoiceList;
//
//        }
//    }

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
     * @return Question
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
     * Set type
     *
     * @param integer $type
     * @return Question
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set approved
     *
     * @param boolean $approved
     * @return Question
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
     * Set testId
     *
     * @param \Test\PollBundle\Entity\Test $testId
     * @return Question
     */
    public function setTestId(\Test\PollBundle\Entity\Test $testId = null)
    {
        $this->testId = $testId;

        return $this;
    }

    /**
     * Get testId
     *
     * @return \Test\PollBundle\Entity\Test 
     */
    public function getTestId()
    {
        return $this->testId;
    }

    /**
     * Add answerOptions
     *
     * @param \Test\PollBundle\Entity\AnswerOption $answerOptions
     * @return Question
     */
    public function addAnswerOption(\Test\PollBundle\Entity\AnswerOption $answerOptions)
    {
        $this->answerOptions[] = $answerOptions;

        return $this;
    }

    /**
     * Remove answerOptions
     *
     * @param \Test\PollBundle\Entity\AnswerOption $answerOptions
     */
    public function removeAnswerOption(\Test\PollBundle\Entity\AnswerOption $answerOptions)
    {
        $this->answerOptions->removeElement($answerOptions);
    }

    
    public function setAnswerOptions(\Doctrine\ORM\EntityManager $em)
    {
        $options = $em->getRepository('TestPollBundle:AnswerOption')->getAnswerOptionsForQuestion($this->id);
        foreach ($options as $o){
            $this->addAnswerOption($o);
        }
    }


    /**
     * Get answerOptions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAnswerOptions()
    {
       
        return $this->answerOptions;
    }
    
    public function __toString() {
        $a = (string)  $this->id;
        return $a;
    }
}
