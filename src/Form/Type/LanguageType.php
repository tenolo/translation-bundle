<?php

namespace Tenolo\Bundle\TranslationBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Tenolo\Bundle\AdminControlPanelBundle\Form\Type\BaseType;
use Tenolo\Bundle\TranslationBundle\Entity\Language;

/**
 * Class LanguageType
 *
 * @package Tenolo\Bundle\TranslationBundle\Form\Type
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class LanguageType extends AbstractType
{

    /**
     * @inheritdoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // basic data
        $basic = $builder->create('basic', 'form', [
            'label'        => 'Allgemein',
            'inherit_data' => true
        ]);
        $basic->add('locale', 'locale', [
            'label' => 'Länder-Code',
            'attr'  => [
                'placeholder' => 'Beispiel: de_DE',
                'help_text'   => 'Wählen Sie bitte die Sprache aus, die Sie übersetzen möchten.'
            ]
        ]);
        $builder->add($basic);
    }

    /**
     * @inheritDoc
     */
    public function getParent()
    {
        return BaseType::class;
    }

    /**
     * @inheritdoc
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Language::class,
        ]);
    }

    /**
     * @inheritDoc
     */
    public function getBlockPrefix()
    {
        return $this->getName();
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'language';
    }
} 