<?php

namespace Tenolo\Bundle\TranslationBundle\CRUD\Configurator;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Tenolo\Bundle\CRUDAdminBundle\CRUD\Configurator\Configurator;
use Tenolo\Bundle\TranslationBundle\Entity\Token;
use Tenolo\Bundle\TranslationBundle\Form\Type\TokenType;

/**
 * Class TokenConfigurator
 *
 * @package Tenolo\Bundle\TranslationBundle\CRUD\Configurator
 * @author  Nikita Loges
 */
class TokenConfigurator extends Configurator
{

    /**
     * @inheritDoc
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'wording_options' => [
                'prefix' => 'translation_token'
            ]
        ]);
    }

    /**
     * @inheritDoc
     */
    protected function buildActions()
    {
        $this->addDefaultListAction([
            'template_name' => 'TenoloTranslationBundle:Token:list.html.twig',
            'entity_name'   => Token::class,
        ]);
        $this->addDefaultAddEditAction([
            'form_type' => TokenType::class,
            'template_name' => 'TenoloTranslationBundle:Token:add.html.twig',
            'entity_name'   => Token::class,
        ]);
        $this->addDefaultRemoveAction([
            'entity_name' => Token::class,
        ]);
    }
}