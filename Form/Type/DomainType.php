<?php

namespace Tenolo\TranslationBundle\Form\Type;

use Tenolo\AdminBundle\Form\Type\BaseType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class DomainType
 * @package Tenolo\TranslationBundle\Form\Type
 * @author Nikita Loges
 * @company tenolo GbR
 * @date 06.08.14
 */
class DomainType extends BaseType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // basic data
        $basic = $builder->create('basic', 'form', array(
            'label' => 'Allgemein',
            'virtual' => true
        ));
        $basic->add('name', 'text', array(
            'label' => 'Name',
            'attr' => array(
                'help_text' => 'Der Name der Domain.'
            )
        ));
        $builder->add($basic);

        parent::buildForm($builder, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tenolo\TranslationBundle\Entity\Domain',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'language_domain';
    }
} 