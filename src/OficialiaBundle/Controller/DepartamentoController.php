<?php

namespace OficialiaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use OficialiaBundle\Form\DepartamentosType;
use OficialiaBundle\Entity\Departamentos;
class DepartamentoController extends Controller
{
    public function addDepartamentoAction(Request $request)
    {
        $departamento = new Departamentos();
        $form = $this->createForm(DepartamentosType::class,$departamento);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) 
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($departamento);
            $em->flush();
            return $this->redirect($this->generateUrl('list_departamento'));
        }
        return $this->render('OficialiaBundle:Departamento:up_departamento.html.twig',['form'=>$form->createView(),'titulo'=>"Agregar departamento"]); 
    }
    public function listDepartamentosAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $departamento = new Departamentos();
        $form = $this->createForm(DepartamentosType::class,$departamento);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) 
        {
            $em->persist($departamento);
            $em->flush();
            return $this->redirect($this->generateUrl('list_departamento'));
        }
        return $this->render('OficialiaBundle:Departamento:departamentos.html.twig',['form'=>$form->createView()]);
    }
    public function getDepartamentosAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('select d.idDepartamento as id, d.departamento as departamento from OficialiaBundle:Departamentos d');
        $departamentos = $query->getResult();
        
        return $this->render('OficialiaBundle:Departamento:lista.html.twig',['departamentos'=>$departamentos]);
    }
    public function delDepartamentoAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $departamento = $em->getRepository('OficialiaBundle:Departamentos')->find($id);
        $em->remove($departamento);
        $em->flush();
        return $this->redirect($this->generateUrl('list_departamento'));
    }
    public function upDepartamentoAction(Request $request,$id)
    {
        $departamento = $this->getDoctrine()->getRepository('OficialiaBundle:Departamentos')->find($id);
        $form = $this->createForm(DepartamentosType::class,$departamento);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) 
        {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($departamento);
            $em->flush();
            return $this->redirect($this->generateUrl('list_departamento'));
        }
        return $this->render('OficialiaBundle:Departamento:up_departamento.html.twig',['form'=>$form->createView(),'titulo'=>"Editar departamento"]); 
    }
}
