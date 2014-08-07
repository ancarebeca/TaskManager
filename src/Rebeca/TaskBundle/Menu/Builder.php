<?php
// src/Rebeca/TaskBundle/Menu/Builder.php
namespace Rebeca\TaskBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
	public function mainMenu(FactoryInterface $factory, array $options)
	{
		$menu = $factory->createItem('mainmenu');

		$menu->addChild('Add task', array('route' => 'task_new'));
		$menu->addChild('Login', array('route' => 'fos_user_security_login'));
		$menu->addChild('Register new user', array('route' => 'fos_user_registration_register'));
		return $menu;
	}
}
