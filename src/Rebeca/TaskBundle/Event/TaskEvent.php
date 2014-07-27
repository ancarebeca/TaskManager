<?php

namespace Rebeca\TaskBundle\Event;

use Rebeca\TaskBundle\Entity\Task;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class TaskEvent
 * @package Rebeca\TaskBundle\Event
 */
class TaskEvent extends Event
{
    /**
     * @var
     */
    private $user;
    /**
     * @var
     */
    private $task;

    /**
     * @param UserInterface $user
     * @param Task $task
     */
    public function __construct($user, Task $task)
    {
        $this -> user = $user;
        $this -> task = $task;
    }

    public function getUser()
    {
        return $this ->user;
    }

    public function getTask()
    {
        return $this ->task;
    }
}