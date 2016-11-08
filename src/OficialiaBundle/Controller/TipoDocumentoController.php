<?php

namespace OficialiaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use OficialiaBundle\Entity\TiposDocumentos;
use OficialiaBundle\Form\TiposDocumentosType;
class TipoDocumentoController extends Controller
{
    public function addTipoDocumentoAction(Request $request)
    {
        $tipo = new TiposDocumentos();
        $form = $this->createForm(TiposDocumentosType::class,$tipo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipo);
            $em->flush();

            return $this->redirect($this->generateUrl('list_tipoDocumento'));

        }
        return $this->render('OficialiaBundle:TipoDocumento:up_tipodocumento.html.twig',['form'=>$form->createView(),'titulo'=>"Agregar tipo de documento"]);
    }
    public function delTipoDocumentoAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $tipo = $em->getRepository('OficialiaBundle:TiposDocumentos')->find($id);
        $em->remove($tipo);
        $em->flush();
        return $this->redirect($this->generateUrl('list_tipoDocumento'));
    }
    public function upTipoDocumentoAction(Request $request,$id)
    {
        $tipo = $this->getDoctrine()->getRepository('OficialiaBundle:TiposDocumentos')->find($id);
        $form = $this->createForm(TiposDocumentosType::class,$tipo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipo);
            $em->flush();

            return $this->redirect($this->generateUrl('list_tipoDocumento'));

        }
        return $this->render('OficialiaBundle:TipoDocumento:up_tipodocumento.html.twig',['form'=>$form->createView(),'titulo'=>"Agregar tipo de documento"]);
    }
    public function listTipoDocumentoAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('select t.idTipoDocumento as id, t.tipoDocumento as tipoDocumento from OficialiaBundle:TiposDocumentos t');
        $tipos = $query->getResult();
        
        $tipo = new TiposDocumentos();
        $form = $this->createForm(TiposDocumentosType::class,$tipo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipo);
            $em->flush();

            return $this->redirect($this->generateUrl('list_tipoDocumento'));

        }
        return $this->render('OficialiaBundle:TipoDocumento:list_tipodocumento.html.twig',['tipos'=>$tipos,'form'=>$form->createView()]);
    }
}
