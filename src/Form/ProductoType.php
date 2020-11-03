<?php

namespace App\Form;

use App\Entity\Producto;
use App\Entity\Almacen;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('descripcion')
            ->add('precio', IntegerType::class)
            ->add('stack', IntegerType::class)
            ->add('codigo')
            ->add('almacen', EntityType:: class, [
                'class' => Almacen::class,
                'choice_label' => 'descripcion'
            ])
            ->add('Enviar', SubmitType:: class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Producto::class,
        ]);
    }
}
