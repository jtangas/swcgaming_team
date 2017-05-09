<?php

namespace Swc\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SwcMainBundle:Default:index.html.twig');
    }
}
