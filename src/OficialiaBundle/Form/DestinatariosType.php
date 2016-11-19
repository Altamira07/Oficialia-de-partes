<?php

namespace OficialiaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class DestinatariosType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        //EntityType::class, ['class' => 'Practica2Bundle:City','choice_label'=>'name']
        $builder->add('fechaLimite',DateType::class)
        ->add('entregado',CheckboxType::class,['value'=>false,'label'=>'es oficial:'])
        ->add('recibe',TextType::class)
        ->add('idDepartamento',EntityType::class,['class'=>'OficialiaBundle:Departamentos','choice_label'=>'departamento'])
        ->add('idInstruccion',EntityType::class,['class'=>'OficialiaBundle:Instrucciones','choice_label'=>'instruccion'])
        ->add('guardar',SubmitType::class)
                ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'OficialiaBundle\Entity\Destinatarios'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'oficialiabundle_destinatarios';
    }


}
