<?php

namespace Tenolo\Bundle\TranslationBundle\EventListener;

use Knp\Menu\ItemInterface;
use Tenolo\Bundle\MenuBundle\Event\MenuBuilderEvent;
use Tenolo\Bundle\MenuBundle\EventListener\BaseMenuStructureListener;

/**
 * Class MenuStructureListener
 * @package Tenolo\Bundle\TranslationBundle\EventListener
 * @author Nikita Loges
 * @company tenolo GbR
 * @date 16.01.2015
 */
class MenuStructureListener extends BaseMenuStructureListener
{

    /**
     * @param MenuBuilderEvent $event
     */
    public function onMenuBuilder(MenuBuilderEvent $event)
    {
        switch ($event->getIdentifier()) {
            case 'navbar-top-left':
                $this->buildNavbarTopLeft($event);
                break;
        }
    }

    /**
     * @param MenuBuilderEvent $event
     */
    protected function buildNavbarTopLeft(MenuBuilderEvent $event)
    {
        $root = $event->getItem();

        $this->addLanguageItems($root);
    }

    /**
     * @param ItemInterface $root
     */
    protected function addLanguageItems(ItemInterface $root)
    {
        $singular = $this->getEntityTranslation('translation_language.object.singular');
        $plural = $this->getEntityTranslation('translation_language.object.plural');

        $child = $this->addRootItem($root, $plural, 'flag');

        $this->addHeader($child, $plural);
        $this->addListEntityItem($child, $plural, 'tenolo_translation_language_list');
        $this->addAddEntityItem($child, $singular, 'tenolo_translation_language_add', array(), array(
            'extras' => array(
                'routes' => array(
                    'tenolo_translation_language_edit'
                )
            )
        ));

        $singular = $this->getEntityTranslation('translation_domain.object.singular');
        $plural = $this->getEntityTranslation('translation_domain.object.plural');

        $this->getMenuBuilderService()->addDivider($child);

        $this->addHeader($child, $plural);
        $this->addListEntityItem($child, $plural, 'tenolo_translation_domain_list');
        $this->addAddEntityItem($child, $singular, 'tenolo_translation_domain_add', array(), array(
            'extras' => array(
                'routes' => array(
                    'tenolo_translation_domain_edit'
                )
            )
        ));

        $singular = $this->getEntityTranslation('translation_token.object.singular');
        $plural = $this->getEntityTranslation('translation_token.object.plural');

        $this->getMenuBuilderService()->addDivider($child);

        $this->addHeader($child, $plural);
        $this->addListEntityItem($child, $plural, 'tenolo_translation_token_list');
        $this->addAddEntityItem($child, $singular, 'tenolo_translation_token_add', array(), array(
            'extras' => array(
                'routes' => array(
                    'tenolo_translation_token_edit'
                )
            )
        ));

        $singular = $this->getEntityTranslation('translation.object.singular');
        $plural = $this->getEntityTranslation('translation.object.plural');

        $this->getMenuBuilderService()->addDivider($child);

        $this->addHeader($child, $plural);
        $this->addListEntityItem($child, $plural, 'tenolo_translation_translation_list');
        $this->addAddEntityItem($child, $singular, 'tenolo_translation_translation_add', array(), array(
            'extras' => array(
                'routes' => array(
                    'tenolo_translation_translation_edit'
                )
            )
        ));
    }
}