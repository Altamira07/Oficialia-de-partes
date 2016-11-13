<?php

namespace OficialiaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use OficialiaBundle\Form\DestinatariosType;
use OficialiaBundle\Entity\Destinatarios;
use OficialiaBundle\Entity\Instrucciones;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DocumentoController extends Controller
{
    
    public function departamentoAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('select d.idDepartamento as key, d.departamento as value  from OficialiaBundle:Departamentos d');
        $departamentos = $query->getResult();
        $json = array();
        foreach ($departamentos as $key) {
            $json['data'][]=$key;
        }
        return new Response(json_encode($json,JSON_PRETTY_PRINT), 200, ['Content-Type' => 'application/json']);
    }
    public function instruccionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('select i.idInstruccion as key, i.instruccion as value from OficialiaBundle:Instrucciones i');
        $instrucciones = $query->getResult();
        $json = array();
        foreach ($instrucciones as $key) {
            $json['data'][]=$key;
        }
        return new Response(json_encode($json,JSON_PRETTY_PRINT), 200, ['Content-Type' => 'application/json']);
    }
    public function institucionAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('select i.idInstituciones as key, i.institucion as value from OficialiaBundle:Instituciones i');
        $instituciones = $query->getResult();
        $json = array();
        foreach ($instituciones as $key) {
            $json['data'][]=$key;
        }
        return new Response(json_encode($json,JSON_PRETTY_PRINT), 200, ['Content-Type' => 'application/json']);
    }
    public function inicioAction()
    {
        return $this->render('OficialiaBundle:Documento:agregar_documento.html.twig');
    }
    public function guardarAction()
    {
        return new Response("Se guardo");
    }
}
