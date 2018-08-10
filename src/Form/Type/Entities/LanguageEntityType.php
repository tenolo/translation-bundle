<?php

namespace Tenolo\Bundle\TranslationBundle\Form\Type\Entities;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Tenolo\Bundle\TranslationBundle\Entity\Language;

/**
 * Class LanguageEntityType
 *
 * @package Tenolo\Bundle\TranslationBundle\Form\Type\Entities
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class LanguageEntityType extends AbstractType
{

    /**
     * @inheritdoc
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'placeholder' => 'Wählen Sie eine Sprache aus',
            'class'       => Language::class,
            'label'       => 'Sprache'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getParent()
    {
        return EntityType::class;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getBlockPrefix();
    }

    /**
     * @inheritDoc
     */
    public function getBlockPrefix()
    {
        return 'tenolo_translation_entity_'.\Symfony\Component\Form\AbstractType::getBlockPrefix();
    }
}