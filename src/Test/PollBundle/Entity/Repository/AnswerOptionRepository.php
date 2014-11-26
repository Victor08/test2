<?php

namespace Test\PollBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * AnswerRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AnswerOptionRepository extends EntityRepository
{
    public function getAnswerOptionsForQuestion($questionId)
    {
        $qb = $this->createQueryBuilder('a')
                   ->select('a')                      
                   ->where("a.questionId = :question_id")
                   ->setParameter("question_id", $questionId);
        
        $qb->addOrderBy('a.id');


       
        
        $result = $qb->getQuery()
                     ->getResult();
      
        
        return $result;
    }
    
     public function getAnswerOptionsForQuestionArray($questionId)
    {
        $qb = $this->createQueryBuilder('a')
                   ->select('a')                      
                   ->where("a.questionId = :question_id")
                   ->setParameter("question_id", $questionId);
        
        $qb->addOrderBy('a.id');


       
        
        $result = $qb->getQuery()
                     ->getArrayResult();
      
        
        return $result;
    }
    
    public function getAnswersForAllQuestions($questions, $approved = true)
    {
        $qb = $this->createQueryBuilder('a')
                   ->select('a');
                   
        for($i=0; $i<count($questions); $i++) {
            $qb->orWhere ("a.question = :question_id{$i}")
               ->setParameter("question_id{$i}", $questions[$i]['id']);
        }
        $qb->addOrderBy('a.id');


        if (false === is_null($approved))
            $qb->andWhere('a.approved = :approved')
               ->setParameter('approved', $approved);
        
        $result = $qb->getQuery()
                     ->getResult();
        $answers = array();
        for ($i=0; $i<count($result); $i++ ) {
            $r = $result[$i];
            $answers[$i] = array ('id'        =>$r->getId(),
                                'correct'   =>$r->getCorrect(),
                                'title'     =>$r->getTitle(),
                                'question_id'=>$r->getQuestion()->getId(),
                                'approved'  =>$r->getApproved(),
                                );
        }
        return $answers;
    }
}