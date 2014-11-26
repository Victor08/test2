<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Test\PollBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class UserAnswerPaperType extends AbstractType 
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    
        $answerPaper = $options['attr']['test']->getQuestionPaper();
        $builder->add('testId');
        for ($i=0; $i<count($answerPaper);$i++){
            if ($answerPaper[$i]['questionType'] == 1){
            $builder->add('userAnswers_'.$i, 'choice', array(
                'property_path' => 'userAnswers['.$i.']',
                'choices' => array ($answerPaper[$i]['answerOptions']),
                'expanded' => true,
                'multiple' => true,
                ));
            } else if ($answerPaper[$i]['questionType']==2) {
                $builder->add('userAnswers_'.$i, 'choice', array(
                'property_path' => 'userAnswers['.$i.']',
                'choices' => array ($answerPaper[$i]['answerOptions']),
                'expanded' => true,
                'multiple' => false,
                ));
            }
        }
        $builder->add('submit', 'submit');

    }
    
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Test\PollBundle\Entity\UserAnswerPaper',
        ));
    }
    
    public function getName()
    {
        return 'UserAnswerPaper';
    }
}