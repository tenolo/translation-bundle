<?php

namespace Tenolo\Bundle\TranslationBundle\Form\Type\Entities;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Tenolo\Bundle\TranslationBundle\Entity\Language;

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
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults(array(
            'placeholder' => 'Wählen Sie eine Sprache aus',
            'class' => Language::class,
            'label' => 'Sprache'
        ));
    }

    /**
     * @inheritdoc
     */
    public function getParent()
    {
        return EntityType::class;
    }
}