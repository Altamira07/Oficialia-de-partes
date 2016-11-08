<?php

namespace OficialiaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use OficialiaBundle\Form\FormatosType;
use OficialiaBundle\Entity\Formatos;
class FormatoController extends Controller
{
    public function addFormatoAction(Request $request)
    {
        $formato = new Formatos();
        $form = $this->createForm(FormatosType::class,$formato);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($formato);
            $em->flush();
            return $this->redirect($this->generateUrl('list_formato'));
        }
        return $this->render('OficialiaBundle:Formato:up_formato.html.twig',['form'=>$form->createView(),'titulo'=>"Agregar formato"]);
    }
    public function upFormatoAction(Request $request,$id)
    {
        $formato = $this->getDoctrine()->getRepository('OficialiaBundle:Formatos')->find($id);
        $form = $this->createForm(FormatosType::class,$formato);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($formato);
            $em->flush();
            $this->redirect($this->generateUrl('list_formato'));
        }
        return $this->render('OficialiaBundle:Formato:up_formato.html.twig',['form'=>$form->createView(),'titulo'=>'Actualizar formato']);
    }
    public function listFormatoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("select f.idFormato as id, f.formato as formato from OficialiaBundle:Formatos f");
        $formatos = $query->getResult();
        $formato = new Formatos();
        $form = $this->createForm(FormatosType::class,$formato);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($formato);
            $em->flush();
            return $this->redirect($this->generateUrl('list_formato'));
        }



        return $this->render('OficialiaBundle:Formato:list_formatos.html.twig',['formatos'=>$formatos,'form'=>$form->createView()]);
    }
    public function delFormatoAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $formato = $em->getRepository('OficialiaBundle:Formatos')->find($id);
        $em->remove($formato);
        $em->flush();
        return $this->redirect($this->generateUrl('list_formato'));
    }
}
