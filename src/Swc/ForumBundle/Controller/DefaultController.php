<?php

namespace Swc\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SwcForumBundle:Default:index.html.twig');
    }
}
