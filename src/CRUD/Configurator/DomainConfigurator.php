<?php

namespace Tenolo\Bundle\TranslationBundle\CRUD\Configurator;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Tenolo\Bundle\CRUDAdminBundle\CRUD\Configurator\Configurator;
use Tenolo\Bundle\TranslationBundle\Entity\Domain;
use Tenolo\Bundle\TranslationBundle\Form\Type\DomainType;

/**
 * Class DomainConfigurator
 *
 * @package Tenolo\Bundle\TranslationBundle\CRUD\Configurator
 * @author  Nikita Loges
 */
class DomainConfigurator extends Configurator
{

    /**
     * @inheritDoc
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'wording_options' => [
                'prefix' => 'translation_domain'
            ]
        ]);
    }

    /**
     * @inheritDoc
     */
    protected function buildActions()
    {
        $this->addDefaultListAction([
            'template_name' => 'TenoloTranslationBundle:Domain:list.html.twig',
            'entity_name'   => Domain::class,
        ]);
        $this->addDefaultAddEditAction([
            'form_type' => DomainType::class,
            'template_name' => 'TenoloTranslationBundle:Domain:add.html.twig',
            'entity_name'   => Domain::class,
        ]);
        $this->addDefaultRemoveAction([
            'entity_name' => Domain::class,
        ]);
    }
}