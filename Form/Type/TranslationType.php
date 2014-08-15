<?php

namespace Tenolo\TranslationBundle\Form\Type;

use Tenolo\AdminControlPanelBundle\Form\Type\BaseType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class TranslationType
 * @package Tenolo\TranslationBundle\Form\Type
 * @author Nikita Loges
 * @company tenolo GbR
 * @date 06.08.14
 */
class TranslationType extends BaseType
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
        $basic->add('language', 'entity', array(
            'label' => 'Sprache',
            'property' => 'name',
            'class' => 'TenoloTranslationBundle:Language',
            'attr' => array(
                'help_text' => 'Wählen Sie bitte die Sprache aus, in die übersetzt wird.'
            )
        ));
        $basic->add('token', 'entity', array(
            'label' => 'Token',
            'class' => 'TenoloTranslationBundle:Token',
            'attr' => array(
                'help_text' => 'Wählen Sie den Token aus, für den eine Übersetzung angelegt werden soll.'
            )
        ));
        $basic->add('translation', 'textarea', array(
            'label' => 'Übersetzung',
            'attr' => array(
                'rows' => 5,
                'help_text' => 'Tragen Sie hier die eigentliche Übersetzung ein.'
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
            'data_class' => 'Tenolo\TranslationBundle\Entity\Translation',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'language_translation';
    }
} 