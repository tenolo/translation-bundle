<?php

namespace Tenolo\Bundle\TranslationBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Tenolo\Bundle\AdminControlPanelBundle\Form\Type\BaseType;

/**
 * Class LanguageType
 * @package Tenolo\Bundle\TranslationBundle\Form\Type
 * @author Nikita Loges
 * @company tenolo GbR
 * @date 06.08.14
 */
class LanguageType extends BaseType
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
        $basic->add('locale', 'locale', array(
            'label' => 'Länder-Code',
            'attr' => array(
                'placeholder' => 'Beispiel: de_DE',
                'help_text' => 'Wählen Sie bitte die Sprache aus, die Sie übersetzen möchten.'
            )
        ));
        $builder->add($basic);

        parent::buildForm($builder, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults(array(
            'data_class' => 'Tenolo\Bundle\TranslationBundle\Entity\Language',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'language';
    }
} 