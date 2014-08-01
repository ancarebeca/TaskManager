<?php

namespace Rebeca\TaskBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Rebeca\TaskBundle\Entity\User;

class UserFixtures extends  AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
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
		$this->container = $container;
	}
	
	public function getOrder()
	{
		return 1; // number in which order to load fixtures
	}
	public function load(ObjectManager $manager)
	{
		$userManager = $this->container->get('fos_user.user_manager');
		
		$user = $userManager->createUser();
		$user->setUsername('user');
		$user->setEmail('user@example.com');
		$user->setPassword('user');
		$user->setPlainPassword('user');
		$user->setEnabled(true);
		$user->setRoles( array(User::ROLE_DEFAULT) ) ;
		$userManager->updateUser($user);
	}
}


