<?php

namespace Dg\MercurialeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TarifType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tarif')
            ->add('date')
            ->add('produit')
            ->add('societe')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Dg\MercurialeBundle\Entity\Tarif'
        ));
    }

    public function getName()
    {
        return 'dg_mercurialebundle_tariftype';
    }
}
