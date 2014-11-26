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
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;

class UserAnswerType extends AbstractType 

{
  
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder->add('answerOptionId', 'choice', array(
            'choice_list' => new ChoiceList(array(1, 0.5), array('Full', 'Half'))));

    }
    
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Test\PollBundle\Entity\UserAnswer',
        ));
    }
    
    
    
    public function getName()
    {
        return 'UserAnswer';
    }
    
}