<?php
/**
 * User:
 */

namespace Rebeca\TaskBundle\EventListener;
use Rebeca\TaskBundle\Event\TaskEvent;
use Symfony\Bridge\Monolog\Logger;
use Symfony\Bundle\SwiftmailerBundle\Command\SendEmailCommand;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;



class EmailConfirmationListener
{
    private $logger;
    private $mailer;
    private $container;
    
    public function __construct(Logger $logger, \Swift_Mailer $mailer, Container $container)
    {
        $this -> logger    = $logger;
        $this -> mailer    = $mailer;
        $this -> container = $container;
    }

    public function onConfirmationSuccess(TaskEvent $event)
    {
        $this ->logger->info(" New Task has been created ".$event->getTask()->getName(). " by user ".$event->getUser());

        try{        		
        	$message = \Swift_Message::newInstance()
        	->setSubject('New task has been created.')
        	->setFrom($this->container->getParameter('mailer_user'))
        	->setTo($event->getUser()->getEmail())
        	->setBody($this->container->get('templating')->render('TaskBundle:MailTemplate:emailConfirmationTask.html.twig', array('task' => $event->getTask(), 'creator' => $event->getUser())));
        	       		
        	$this-> mailer ->send($message);
        		
        }catch(Exception $e){
        	$this ->logger->error( "Sorry, email message could not be delivered " . $e->getMessage());
        }
        
    }
}