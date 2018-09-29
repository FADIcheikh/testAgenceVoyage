<?php

namespace tunigo\tripBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('tripBundle:Default:index.html.twig', array('name' => $name));
    }
}
