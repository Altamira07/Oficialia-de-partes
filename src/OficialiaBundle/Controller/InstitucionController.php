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
        if ($form->isSubmitted() && $form->isValid() )
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($institucion);
            $em->flush();
            return $this->redirect($this->generateUrl('list_institucion'));    
        }
        return $this->render('OficialiaBundle:Institucion:up_institucion.html.twig',['form'=>$form->createView(),'titulo'=>"Agregar instituto"]);
    }
    public function listInstitucionAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $institucion = new Instituciones();
        $form = $this->createForm(InstitucionesType::class,$institucion);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid() )
        {
            $em->persist($institucion);
            $em->flush();
            return $this->redirect($this->generateUrl('list_institucion'));    
        }

        return $this->render('OficialiaBundle:Institucion:institucion.html.twig',['form'=>$form->createView()]);
    }
    public function getInstitucionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('select i.idInstituciones as id, i.institucion as institucion from OficialiaBundle:Instituciones i');
        $instituciones = $query->getResult();
        return $this->render('OficialiaBundle:Institucion:lista.html.twig',['instituciones'=>$instituciones]);

    }
    public function upInstitucionAction(Request $request,$id)
    {
        $instituto = $this->getDoctrine()->getRepository('OficialiaBundle:Instituciones')->find($id);
        $form = $this->createForm(InstitucionesType::class,$instituto);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($instituto);
            $em->flush();
            return $this->redirect($this->generateUrl('list_institucion'));
        }
        return $this->render('OficialiaBundle:Institucion:up_institucion.html.twig',['form'=>$form->createView(),'titulo'=>"Editar instituto"]);
    }
    public function delInstitucionAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $institucion = $em->getRepository('OficialiaBundle:Instituciones')->find($id);
        $em->remove($institucion);
        $em->flush();
        return $this->redirect($this->generateUrl('list_institucion'));
    }
}
