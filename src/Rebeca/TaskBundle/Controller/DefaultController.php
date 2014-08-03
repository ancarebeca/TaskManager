<?php

namespace Rebeca\TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
/**
 *
 * @Route("/")
 */
class DefaultController extends Controller
{
    /**
     *
     * @Route("/")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $allTasks = $em->getRepository('TaskBundle:Task')->findAll();
        return array(
            'allTasks' => $allTasks,
        );
    }
}
