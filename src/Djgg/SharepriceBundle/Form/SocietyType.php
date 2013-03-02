<?php

namespace Djgg\SharepriceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SocietyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('tel')
            ->add('fax')
            ->add('description')
            ->add('contact')
            ->add('address')
            ->add('locality')
            ->add('country')
            ->add('administrativeAreaLevel2')
            ->add('administrativeAreaLevel1')
            ->add('postalCode')
            ->add('lat')
            ->add('lng')
            ->add('group')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Djgg\SharepriceBundle\Entity\Society'
        ));
    }

    public function getName()
    {
        return 'djgg_sharepricebundle_societytype';
    }
}
