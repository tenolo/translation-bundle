<?php

namespace Tenolo\Bundle\TranslationBundle\Form\Type\Entities;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Tenolo\Bundle\TranslationBundle\Entity\Domain;

/**
 * Class DomainEntityType
 *
 * @package Tenolo\Bundle\TranslationBundle\Form\Type\Entities
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class DomainEntityType extends AbstractType
{

    /**
     * @inheritdoc
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'placeholder' => 'Wählen Sie eine Domain aus',
            'class'       => Domain::class,
            'label'       => 'Domain'
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
        return 'tenolo_translation_entity_' . \Symfony\Component\Form\AbstractType::getBlockPrefix();
    }
}