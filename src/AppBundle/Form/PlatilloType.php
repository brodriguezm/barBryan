<?php

namespace AppBundle\Form;

use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PlatilloType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('foto', FileType::class, array('label' => 'Presentación'))
            ->add('nombre', TextType::class)
            ->add('descripcion', TextareaType::class)
            ->add('ingredientes', CKEditorType::class)
            ->add('top', CheckboxType::class, array('label' => 'Platillo especial'))
            ->add('guardar', SubmitType::class, array('label' => 'Crear Platillo'))
        ;
    }
}