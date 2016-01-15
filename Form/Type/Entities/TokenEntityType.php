<?php

namespace Tenolo\Bundle\TranslationBundle\Form\Type\Entities;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Tenolo\Bundle\TranslationBundle\Entity\Token;

/**
 * Class TokenEntityType
 * @package Tenolo\Bundle\TranslationBundle\Form\Type\Entities
 * @author Nikita Loges
 * @company tenolo GbR
 * @date 14.08.2015
 */
class TokenEntityType extends AbstractType
{

    /**
     * @inheritdoc
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults(array(
            'placeholder' => 'Wählen Sie einen Token aus',
            'class' => Token::class,
            'label' => 'Token'
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