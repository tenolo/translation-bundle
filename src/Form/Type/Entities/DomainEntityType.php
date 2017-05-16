<?php

namespace Tenolo\Bundle\TranslationBundle\Form\Type\Entities;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Tenolo\Bundle\TranslationBundle\Entity\Domain;

/**
 * Class DomainEntityType
 * @package Tenolo\Bundle\TranslationBundle\Form\Type\Entities
 * @author Nikita Loges
 * @company tenolo GbR
 * @date 14.08.2015
 */
class DomainEntityType extends AbstractType
{

    /**
     * @inheritdoc
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults(array(
            'placeholder' => 'Wählen Sie eine Domain aus',
            'class' => Domain::class,
            'choice_label' => 'name',
            'label' => 'Domain'
        ));
    }

    /**
     * @inheritdoc
     */
    public function getParent()
    {
        return EntityType::class;
    }

    /**
     * @inheritDoc
     */
    public function getBlockPrefix()
    {
        return 'tenolo_translation_entity_'.\Symfony\Component\Form\AbstractType::getBlockPrefix();
    }
}