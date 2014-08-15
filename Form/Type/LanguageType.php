<?php

namespace Tenolo\TranslationBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Tenolo\AdminControlPanelBundle\Form\Type\BaseType;

/**
 * Class LanguageType
 * @package Tenolo\TranslationBundle\Form\Type
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
            'virtual' => true
        ));
        $basic->add('name', 'text', array(
            'label' => 'Name',
            'attr' => array(
                'placeholder' => 'Name',
                'help_text' => 'Der Name der Sprache.'
            )
        ));
        $basic->add('locale', 'text', array(
            'label' => 'Länder-Code',
            'attr' => array(
                'placeholder' => 'Beispiel: de_DE',
                'help_text' => 'Geben Sie hier bitte den Ländercode ein. Das Format sollte der folgenden Spezifizierung folgen: Der ISO 639-1 Sprachen-Code, dann eine Unterlinie (_) und der ISO 3166-1 alpha-2 Länder-Code. Beispiel: de_DE'
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
            'data_class' => 'Tenolo\TranslationBundle\Entity\Language',
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