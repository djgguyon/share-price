<?php

namespace Djgg\SharepriceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PriceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('price')
            ->add('date')
            ->add('product')
            ->add('society')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Djgg\SharepriceBundle\Entity\Price'
        ));
    }

    public function getName()
    {
        return 'djgg_sharepricebundle_pricetype';
    }
}
