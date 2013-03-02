<?php

namespace Dg\MercurialeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SocieteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('tel')
            ->add('fax')
            ->add('description')
            ->add('contact')
            ->add('groupe')
			->add('address', 'gmap_address', array('data_class' => 'Dg\MercurialeBundle\Entity\Societe',
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Dg\MercurialeBundle\Entity\Societe'
        ));
    }

    public function getName()
    {
        return 'dg_mercurialebundle_societetype';
    }
}
