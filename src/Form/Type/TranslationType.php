<?php

namespace Tenolo\Bundle\TranslationBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Tenolo\Bundle\AdminControlPanelBundle\Form\Type\BaseType;
use Tenolo\Bundle\TranslationBundle\Entity\Translation;

/**
 * Class TranslationType
 *
 * @package Tenolo\Bundle\TranslationBundle\Form\Type
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class TranslationType extends AbstractType
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
        $basic->add('language', 'entity', [
            'label'    => 'Sprache',
            'property' => 'name',
            'class'    => 'TenoloTranslationBundle:Language',
            'attr'     => [
                'help_text' => 'Wählen Sie bitte die Sprache aus, in die übersetzt wird.'
            ]
        ]);
        $basic->add('token', 'entity', [
            'label' => 'Token',
            'class' => 'TenoloTranslationBundle:Token',
            'attr'  => [
                'help_text' => 'Wählen Sie den Token aus, für den eine Übersetzung angelegt werden soll.'
            ]
        ]);
        $basic->add('translation', 'textarea', [
            'label' => 'Übersetzung',
            'attr'  => [
                'rows'      => 5,
                'help_text' => 'Tragen Sie hier die eigentliche Übersetzung ein.'
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
            'data_class' => Translation::class,
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
        return 'language_translation';
    }
} 