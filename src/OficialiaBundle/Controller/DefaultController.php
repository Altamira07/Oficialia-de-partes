<?php

namespace OficialiaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('OficialiaBundle:Default:index.html.twig');
    }
    public function cargandoAction()
    {
        return $this->render('OficialiaBundle:Default:cargando.html.twig');
    }
}
