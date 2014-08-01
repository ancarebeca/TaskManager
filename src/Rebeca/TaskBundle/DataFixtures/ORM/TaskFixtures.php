<?php

namespace Rebeca\TaskBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Rebeca\TaskBundle\Entity\Status;
use Rebeca\TaskBundle\Entity\Task;
use Rebeca\TaskBundle\Entity\User;

class TaskFixtures extends  AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
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
        return 3; // number in which order to load fixtures
    }
	
	public function load(ObjectManager $manager)
	{
		// Get Status
		$openStatus = $manager->getRepository('TaskBundle:Status')->findOneByName('open');
		$InProgressStatus = $manager->getRepository('TaskBundle:Status')->findOneByName('InProgress');
		
		//Get User
		$userManager = $this->container->get('fos_user.user_manager');
		$userName= $userManager->findUserByUsername('user');
	
		$allTask = array(
				array('name' => 'Create user', 'description' => 'Create user Description', 'createdAt'=> new \DateTime("2012-07-08 11:14:00"), 
					  'updatedAt'=> new \DateTime("2012-07-09 11:14:00"), 'finishedAt'=>new \DateTime("2012-07-10 11:14:00"), 'status'=>$openStatus, 'userName'=>$userName),
				array('name' => 'Backup Database', 'description' => 'Backup Database Description', 'createdAt'=> new \DateTime("2012-07-10 11:14:00"), 
					  'updatedAt'=> new \DateTime("2012-07-11 11:14:00"), 'finishedAt'=>new \DateTime("2012-07-12 11:14:00"), 'status'=>$InProgressStatus, 'userName'=>$userName),
				
		);

		foreach ($allTask as $task) {
			$taskEntity = new Task();
			$taskEntity->setName($task['name']);
			$taskEntity->setDescription($task['description']);
			$taskEntity->setStatus($task['status']);
			$taskEntity->setCreatedAt($task['createdAt']);
			$taskEntity->setUpdatedAt($task['updatedAt']);
			$taskEntity->setFinishedAt($task['finishedAt']);
			$taskEntity->setFinishedAt($task['finishedAt']);
			$taskEntity->setUser($task['userName']);
		
			$manager->persist($taskEntity);
		}
		$manager->flush();
	}
}


