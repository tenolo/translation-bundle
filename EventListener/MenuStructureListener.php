<?php

namespace Tenolo\Bundle\TranslationBundle\EventListener;

use Knp\Menu\ItemInterface;
use Tenolo\Bundle\MenuBundle\Event\MenuBuilderEvent;
use Tenolo\Bundle\MenuBundle\EventListener\BaseMenuStructureListener;

/**
 * Class MenuStructureListener
 * @package RabeConcept\Shop\TranslationBundle\EventListener
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
        $singular = $this->getEntityTranslation('translation.language.object.singular');
        $plural = $this->getEntityTranslation('translation.language.object.plural');

        $child = $this->addRootItem($root, $plural, 'flag');

        $this->addHeader($child, $plural);
        $this->addListEntityItem($child, $plural, 'acp.translation.language.list');
        $this->addAddEntityItem($child, $singular, 'acp.translation.language.add', array(), array(
            'extras' => array(
                'routes' => array(
                    'acp.translation.language.edit'
                )
            )
        ));

        $singular = $this->getEntityTranslation('translation.domain.object.singular');
        $plural = $this->getEntityTranslation('translation.domain.object.plural');

        $this->getMenuBuilderService()->addDivider($child);

        $this->addHeader($child, $plural);
        $this->addListEntityItem($child, $plural, 'acp.translation.domain.list');
        $this->addAddEntityItem($child, $singular, 'acp.translation.domain.add', array(), array(
            'extras' => array(
                'routes' => array(
                    'acp.translation.domain.edit'
                )
            )
        ));

        $singular = $this->getEntityTranslation('translation.token.object.singular');
        $plural = $this->getEntityTranslation('translation.token.object.plural');

        $this->getMenuBuilderService()->addDivider($child);

        $this->addHeader($child, $plural);
        $this->addListEntityItem($child, $plural, 'acp.translation.token.list');
        $this->addAddEntityItem($child, $singular, 'acp.translation.token.add', array(), array(
            'extras' => array(
                'routes' => array(
                    'acp.translation.token.edit'
                )
            )
        ));

        $singular = $this->getEntityTranslation('translation.object.singular');
        $plural = $this->getEntityTranslation('translation.object.plural');

        $this->getMenuBuilderService()->addDivider($child);

        $this->addHeader($child, $plural);
        $this->addListEntityItem($child, $plural, 'acp.translation.list');
        $this->addAddEntityItem($child, $singular, 'acp.translation.add', array(), array(
            'extras' => array(
                'routes' => array(
                    'acp.translation.edit'
                )
            )
        ));
    }
}