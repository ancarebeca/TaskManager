<?php
/**
 * User:
 */

namespace Rebeca\TaskBundle\EventListener;
use Rebeca\TaskBundle\Event\TaskEvent;
use Symfony\Bridge\Monolog\Logger;



class EmailConfirmationListener
{
    private $logger;

    public function __construct(Logger $logger)
    {
        $this -> logger = $logger;
    }

    public function onConfirmationSuccess(TaskEvent $event)
    {
        $this ->logger->info(" New Task has been created ".$event->getTask()->getName(). " by user ".$event->getUser());
    }
}