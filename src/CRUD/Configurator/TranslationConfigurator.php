<?php

namespace Tenolo\Bundle\TranslationBundle\CRUD\Configurator;

use Tenolo\Bundle\CRUDAdminBundle\CRUD\Configurator\Configurator;
use Tenolo\Bundle\TranslationBundle\Entity\Translation;
use Tenolo\Bundle\TranslationBundle\Form\Type\TranslationType;

/**
 * Class TranslationConfigurator
 *
 * @package Tenolo\Bundle\TranslationBundle\CRUD\Configurator
 * @author  Nikita Loges
 */
class TranslationConfigurator extends Configurator
{

    /**
     * @inheritDoc
     */
    protected function buildActions()
    {
        $this->addDefaultListAction([
            'template_name' => 'TenoloTranslationBundle:Translation:list.html.twig',
            'entity_name'   => Translation::class,
        ]);
        $this->addDefaultAddEditAction([
            'form_type'     => TranslationType::class,
            'template_name' => 'TenoloTranslationBundle:Translation:add.html.twig',
            'entity_name'   => Translation::class,
        ]);
        $this->addDefaultRemoveAction([
            'entity_name' => Translation::class,
        ]);
    }
}