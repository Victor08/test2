<?php

namespace Security\ProfileBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Security\ProfileBundle\Entity\User;
use Security\ProfileBundle\Entity\Role;

class RoleFixtures implements FixtureInterface, ContainerAwareInterface
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
        
        
        
        $role = new Role;
        $role->setName('admin');
        $role->setRole('ROLE_ADMIN');
        $manager->persist($role);
        
        $role = new Role;
        $role->setName('user');
        $role->setRole('ROLE_USER');
        $manager->persist($role);
      
        $manager->flush();
    }
}