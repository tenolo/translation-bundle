<?php

namespace Tenolo\Bundle\TranslationBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Tenolo\Bundle\AdminControlPanelBundle\Form\Type\BaseType;
use Tenolo\Bundle\CoreBundle\Form\Type\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Tenolo\Bundle\TranslationBundle\Entity\Domain;

/**
 * Class DomainType
 * @package Tenolo\Bundle\TranslationBundle\Form\Type
 * @author Nikita Loges
 * @company tenolo GbR
 * @date 06.08.14
 */
class DomainType extends AbstractType
{

    /**
     * @inheritdoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // basic data
        $basic = $builder->create('basic', FormType::class, array(
            'label' => 'Allgemein',
            'inherit_data' => true
        ));
        $basic->add('name', TextType::class, array(
            'label' => 'Name',
            'attr' => array(
                'help_text' => 'Der Name der Domain.'
            )
        ));
        $builder->add($basic);

        parent::buildForm($builder, $options);
    }

    /**
     * @inheritdoc
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults(array(
            'data_class' => Domain::class,
        ));
    }

    /**
     * @inheritdoc
     */
    public function getParent()
    {
        return BaseType::class;
    }

    /**
     * @inheritDoc
     */
    public function getBlockPrefix()
    {
        return 'tenolo_translation_'.\Symfony\Component\Form\AbstractType::getBlockPrefix();
    }
}