<?php

namespace Tenolo\Bundle\TranslationBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Tenolo\Bundle\AdminControlPanelBundle\Form\Type\BaseType;

/**
 * Class TranslationType
 * @package Tenolo\Bundle\TranslationBundle\Form\Type
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
            'inherit_data' => true
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
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults(array(
            'data_class' => 'Tenolo\Bundle\TranslationBundle\Entity\Translation',
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