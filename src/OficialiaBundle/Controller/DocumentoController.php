<?php

namespace OficialiaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\File\File;
use OficialiaBundle\Entity\Destinatarios;
use OficialiaBundle\Entity\Departamentos;
use OficialiaBundle\Entity\Instituciones;

use OficialiaBundle\Entity\Instrucciones;
use OficialiaBundle\Entity\Procedencias;
use OficialiaBundle\Entity\Documentos;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class DocumentoController extends Controller
{
    public function getDocumentosAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('select d.folio as folio, d.documento as documento, i.institucion as institucion from OficialiaBundle:Documentos d inner join OficialiaBundle:Procedencias p with p.idProcedencia = d.idProcedencia inner join OficialiaBundle:Instituciones i with p.idInstitucion = i.idInstituciones ');
        $documentos = $query->getResult();
       return $this->render('OficialiaBundle:Documento:lista.html.twig',['documentos'=>$documentos]);
    }    
    public function documentoAction(Request $request)
    {
        $data = array();
        $documento = new Documentos();
        $destino = new Destinatarios();
        $procedencia = new Procedencias();
        
        $form = $this->formDocumento($data);
        $form->handleRequest($request);
        if ($form->isValid())
        {
              $data = $form->getData();
              $em = $this->getDoctrine()->getManager();
              $file = $data['archivo'];
              $nombre =  md5(uniqid()).'.'.$file->guessExtension();
              $file->move(
                $this->getParameter('documentos'),
                $nombre
              );
              //GUardando deatos de la procedencia 
              $procedencia->setFirma($data['firma']);
              $procedencia->setPuesto($data['puesto']);
              $procedencia->setDirigida($data['dirigida']);
              $procedencia->setAsunto($data['asunto']);
              $procedencia->setObservacion($data['observaciones']);
              $procedencia->setIdInstitucion($data['institucion']);
              //Se guarda la procedencia
              $em->persist($procedencia);
              $em->flush();
              //Guardando destino
              $destino->setFechaLimite($data['fecha_limite']);
              $destino->setEntregado($data['entregado']);
              $destino->setRecibe($data['recibe']);
              $destino->setIdDepartamento($data['departamento']);
              $destino->setIdInstruccion($data['instruccion']);
              $em->persist($destino);
              $em->flush();
              //Guardando documento
              $documento->setDocumento($nombre);
              $documento->setFolio($data['folio']);
              $documento->setFechaDocumento($data['fecha_documento']);
              $documento->setFechaRecepcion($data['fecha_recepcion']);
              $documento->setIdFormato($data['formato']);
              $documento->setIdDestino($destino);
              $documento->setIdProcedencia($procedencia);
              $documento->setIdTipoDocumento($data['tipo_documento']);
              $em->persist($documento);
              $em->flush();
         
            return $this->redirect($this->generateUrl('documento'));
        }
        return $this->render('OficialiaBundle:Documento:agregar.html.twig',['form'=>$form->createView()]);
    }
    private function formDocumento($data)
    { 
        return $this->createFormBuilder($data)
           ->add('folio',TextType::class)
           ->add('fecha_documento',DateType::class,['widget'=>'single_text','label'=>false])
           ->add('fecha_recepcion',DateType::class,['widget'=>'single_text','label'=>false])
           ->add('formato',EntityType::class,['class'=>'OficialiaBundle:Formatos','choice_label'=>'formato'])
           ->add('tipo_documento',EntityType::class,['class'=>'OficialiaBundle:TiposDocumentos','choice_label'=>'tipoDocumento'])
           ->add('fecha_limite',DateType::class,['widget'=>'single_text','label'=>false])
           ->add('entregado',CheckboxType::class,['label'=>'ya fue entregado el documento','required'=>false])
           ->add('recibe',TextType::class)
           ->add('departamento',EntityType::class,['class'=>'OficialiaBundle:Departamentos','choice_label'=>'departamento'])
           ->add('instruccion',EntityType::class,['class'=>'OficialiaBundle:Instrucciones','choice_label'=>'instruccion'])
           ->add('firma',TextType::class)
           ->add('puesto',TextType::class)
           ->add('dirigida',TextType::class)
           ->add('asunto',TextType::class)
           ->add('institucion',EntityType::class,['class'=>'OficialiaBundle:Instituciones','choice_label'=>'institucion'])
           ->add('observaciones',TextareaType::class)
           ->add('archivo',FileType::class)
           ->add('guardar',SubmitType::class)
           ->getForm()
        ;
    }
}
