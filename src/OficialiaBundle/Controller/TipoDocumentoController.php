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

            return $this->redirect($this->generateUrl('add_tipoDocumento'));

        }

        return $this->render('OficialiaBundle:TipoDocumento:add_tipodocumento.html.twig',['form'=>$form->createView()]);
    }
}
