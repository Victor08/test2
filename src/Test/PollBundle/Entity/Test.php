<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Test\PollBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Test\PollBundle\Entity\TestProcessor;




/**
 * @ORM\Entity(repositoryClass="Test\PollBundle\Entity\Repository\TestRepository")
 * @ORM\Table(name="test")
 * @ORM\HasLifecycleCallbacks()
 */
class Test extends TestProcessor
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
     * @ORM\Column(type="string")
     */
    protected $author;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created;
    
    /**
     * @ORM\Column(type="text")
     */
    protected $description;
    
    
    /**
     * @ORM\Column(type="array")
     */
    protected $correctAnswers ;
    
    
    
    public function getQuestionPaper () {
        return $this->questionPaper;
    }

    /**
     * @ORM\OneToMany(targetEntity="Question", mappedBy="testId")
     */
    protected $questions;
    
    public function __construct(\Doctrine\ORM\EntityManager $em=null)
    {
        $this->questions = new ArrayCollection();
        if ($em){
            $this->setQuestionsAndOptions($em);
            
            $this->setCorrectAnswers();
        }
        
        
    }
    
//    public function init($testId=null, \Doctrine\ORM\EntityManager $em=null){
//        
//        if(!$this->id){
//            $this->id = $testId;
//        }
//        if (!)
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
     * @return Test
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
     * Set author
     *
     * @param string $author
     * @return Test
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Test
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }
    
    public function setQuestionsAndOptions (\Doctrine\ORM\EntityManager $em)
    {
        if (!isset($this->id)) { return false; }
        
        $questions = $em->getRepository('TestPollBundle:Question')->getQuestionsForTest($this->id);
        foreach ($questions as $q){
            $this->addQuestion($q);
        } 
        foreach ($this->questions as $q)
        {
            $q->setAnswerOptions($em);
        }
    }
    
    


    public function getQuestions($length = null)
    {
        if (false === is_null($length) && $length > 0)
            return substr($this->questions, 0, $length);
        else
            return $this->questions;
       
    }

    /**
     * Add questions
     *
     * @param \Test\PollBundle\Entity\Question $questions
     * @return Test
     */
    public function addQuestion(\Test\PollBundle\Entity\Question $questions)
    {
        $this->questions[] = $questions;

        return $this;
    }

    /**
     * Remove questions
     *
     * @param \Test\PollBundle\Entity\Question $questions
     */
    public function removeQuestion(\Test\PollBundle\Entity\Question $questions)
    {
        $this->questions->removeElement($questions);
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Test
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    

    /**
     * Get correctAnswers
     *
     * @return array 
     */
    public function getCorrectAnswers()
    {
        return $this->correctAnswers;
    }
    
    public function __toString() {
        return 'Test';
    }
    
   

    

  
}
