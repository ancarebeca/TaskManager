<?php

namespace Rebeca\TaskBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Rebeca\TaskBundle\Entity\Status;

class StatusFixtures extends AbstractFixture implements OrderedFixtureInterface, FixtureInterface
{
	public function getOrder()
	{
		return 2; // number in which order to load fixtures
	}
	
	public function load(ObjectManager $manager)
	{
		$allStatus = array(
				array('name' => 'Open', 'description' => 'Task opened'),
				array('name' => 'InProgress', 'description' => 'Task in progress'),
				array('name' => 'Feedback', 'description' => 'Task needs feedback'),
				array('name' => 'Closed', 'description' => 'Tasl closed'),
		);
		foreach ($allStatus as $status) {
			$statusEntity = new Status();
			$statusEntity->setName($status['name']);
			$statusEntity->setDescription($status['description']);
			
			$manager->persist($statusEntity);
		}
		$manager->flush();
	}
}


