<?php

namespace Tenolo\Bundle\TranslationBundle\Form\Type\Entities;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Tenolo\Bundle\TranslationBundle\Entity\Token;

/**
 * Class TokenEntityType
 *
 * @package Tenolo\Bundle\TranslationBundle\Form\Type\Entities
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class TokenEntityType extends AbstractType
{

    /**
     * @inheritdoc
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'placeholder' => 'Wählen Sie einen Token aus',
            'class'       => Token::class,
            'label'       => 'Token'
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