<?php

namespace Tenolo\Bundle\TranslationBundle\CRUD\Configurator;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Tenolo\Bundle\CRUDAdminBundle\CRUD\Configurator\Configurator;
use Tenolo\Bundle\TranslationBundle\Entity\Language;
use Tenolo\Bundle\TranslationBundle\Form\Type\LanguageType;

/**
 * Class LanguageConfigurator
 *
 * @package Tenolo\Bundle\TranslationBundle\CRUD\Configurator
 * @author  Nikita Loges
 */
class LanguageConfigurator extends Configurator
{

    /**
     * @inheritDoc
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'wording_options' => [
                'prefix' => 'translation_language'
            ]
        ]);
    }

    /**
     * @inheritDoc
     */
    protected function buildActions()
    {
        $this->addDefaultListAction([
            'template_name' => 'TenoloTranslationBundle:Language:list.html.twig',
            'entity_name'   => Language::class,
        ]);
        $this->addDefaultAddEditAction([
            'form_type' => LanguageType::class,
            'template_name' => 'TenoloTranslationBundle:Language:add.html.twig',
            'entity_name'   => Language::class,
        ]);
        $this->addDefaultRemoveAction([
            'entity_name' => Language::class,
        ]);
    }
}