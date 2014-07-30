<?php

namespace Rebeca\TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class SiteController extends Controller
{
    public function staticAction($page)
    {
        return $this->render('TaskBundle:Site:'.$page.'.html.twig');
    }
}
