<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Security\ProfileBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Security\ProfileBundle\Entity\User;
use Security\ProfileBundle\Entity\Role;

class UserFixtures implements FixtureInterface, ContainerAwareInterface
{

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        var_dump('getting container here');
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
      $user = new User();
      $user->setUsername("Viktor_user");
      $user->setSalt(md5(uniqid()));
      $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);
      $user->setPassword($encoder->encodePassword('12345', $user->getSalt()));

      $manager->persist($user);

      $user = new User();
      $user->setUsername("Viktor_admin");
      $user->setSalt(md5(uniqid()));
      $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);
      $user->setPassword($encoder->encodePassword('12345', $user->getSalt()));

      $manager->persist($user);
      
      $manager->flush();
    }
}