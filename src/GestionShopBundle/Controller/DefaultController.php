<?php

namespace GestionShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GestionShopBundle:Default:index.html.twig');
    }
}
