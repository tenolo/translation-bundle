<?php

namespace Tenolo\Bundle\TranslationBundle\Form\Type\Entities;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class LanguageEntityType
 * @package Tenolo\Bundle\TranslationBundle\Form\Type\Entities
 * @author Nikita Loges
 * @company tenolo GbR
 * @date 14.08.2015
 */
class LanguageEntityType extends AbstractType
{

    /**
     * @inheritdoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
    }

    /**
     * @inheritdoc
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults(array(
            'placeholder' => 'Wählen Sie eine Sprache aus',
            'class' => 'Tenolo\Bundle\TranslationBundle\Entity\Language',
            'label' => 'Sprache'
        ));
    }

    /**
     * @inheritdoc
     */
    public function getParent()
    {
        return 'entity';
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'tenolo_translation_language_entity';
    }
}