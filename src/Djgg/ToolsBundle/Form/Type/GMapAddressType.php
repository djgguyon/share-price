<?php
namespace Djgg\ToolsBundle\Form\Type;
 
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
 
/**
 * GMapAddressType
 */
class GMapAddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('address', null, array('required' => true))
                ->add('locality', null, array('required' => false))
                ->add('country', null, array('required' => false))
                ->add('administrativeAreaLevel2', null, array('required' => false))
                ->add('administrativeAreaLevel1', null, array('required' => false))
                ->add('postalCode', null, array('required' => false))
                ->add('lat', null, array('required' => false))
                ->add('lng', null, array('required' => false))
        ;
    }
 
    public function getDefaultOptions(array $options)
    {
        return array('virtual'   => true);
    }
 
    public function getName()
    {
        return 'gmap_address';
    }
}
 