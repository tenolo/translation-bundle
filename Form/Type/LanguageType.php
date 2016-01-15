<?php

namespace Tenolo\Bundle\TranslationBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Tenolo\Bundle\AdminControlPanelBundle\Form\Type\BaseType;
use Tenolo\Bundle\CoreBundle\Form\Type\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\LocaleType;

/**
 * Class LanguageType
 * @package Tenolo\Bundle\TranslationBundle\Form\Type
 * @author Nikita Loges
 * @company tenolo GbR
 * @date 06.08.14
 */
class LanguageType extends AbstractType
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
        $basic->add('locale', LocaleType::class, array(
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
     * @inheritdoc
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults(array(
            'data_class' => 'Tenolo\Bundle\TranslationBundle\Entity\Language',
        ));
    }

    /**
     * @inheritdoc
     */
    public function getParent()
    {
        return BaseType::class;
    }
} 