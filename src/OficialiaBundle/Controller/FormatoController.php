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
            return $this->redirect($this->generateUrl('add_formato'));
        }
        return $this->render('OficialiaBundle:Formato:add_formato.html.twig',['form'=>$form->createView()]);
    }
}
