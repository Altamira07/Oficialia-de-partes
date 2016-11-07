<?php

namespace OficialiaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use OficialiaBundle\Form\InstitucionesType;
use OficialiaBundle\Entity\Instituciones;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
class InstitucionController extends Controller
{
    public function addInstitucionAction(Request $request)
    {
        $institucion = new Instituciones();
        $form = $this->createForm(InstitucionesType::class,$institucion);
        $form->handleRequest($request);
        if ($form->isValid() )
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($institucion);
            $em->flush();
            return $this->redirect($this->generateUrl('add_institucion'));    
        }
        return $this->render('OficialiaBundle:Institucion:add_institucion.html.twig',['form'=>$form->createView()]);
    }
    public function listInstitucionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('select i.idInstituciones as id, i.institucion as institucion from OficialiaBundle:Instituciones i');
        $instituciones = $query->getResult();

        return $this->render('OficialiaBundle:Institucion:list_institucion.html.twig',['instituciones'=>$instituciones]);
    }
}
