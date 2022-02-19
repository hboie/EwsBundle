<?php

namespace Hboie\EwsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    public function indexAction()
    {
        return $this->render('HboieEWSBundle:Default:index.html.twig');
    }
}
