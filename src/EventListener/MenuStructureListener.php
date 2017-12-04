<?php

namespace Tenolo\Bundle\TranslationBundle\EventListener;

use Knp\Menu\ItemInterface;
use Tenolo\Bundle\MenuBundle\Event\MenuCreateEvent;
use Tenolo\Bundle\MenuBundle\EventListener\BaseMenuStructureListener;

/**
 * Class MenuStructureListener
 *
 * @package Tenolo\Bundle\TranslationBundle\EventListener
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class MenuStructureListener extends BaseMenuStructureListener
{

    /**
     * @param MenuCreateEvent $event
     */
    public function onMenuBuilder(MenuCreateEvent $event)
    {
        switch ($event->getIdentifier()) {
            case 'acp_topbar_left':
                $this->buildNavbarTopLeft($event);
                break;
        }
    }

    /**
     * @param MenuCreateEvent $event
     */
    protected function buildNavbarTopLeft(MenuCreateEvent $event)
    {
        $root = $event->getItem();

        $this->addLanguageItems($root);
    }

    /**
     * @param ItemInterface $root
     */
    protected function addLanguageItems(ItemInterface $root)
    {
        $singular = $this->translator->trans('translation.language.object.singular', [], 'entities');
        $plural = $this->translator->trans('translation.language.object.plural', [], 'entities');

        $child = $this->addRootItem($root, $plural, 'flag');

        $this->addHeader($child, $plural);
        $this->addListEntityItem($child, $plural, 'acp.translation.language.list');
        $this->addAddEntityItem($child, $singular, 'acp.translation.language.add', [], [
            'extras' => [
                'routes' => [
                    'acp.translation.language.edit'
                ]
            ]
        ]);

        $singular = $this->translator->trans('translation.domain.object.singular', [], 'entities');
        $plural = $this->translator->trans('translation.domain.object.plural', [], 'entities');

        $this->getMenuBuilderService()->addDivider($child);

        $this->addHeader($child, $plural);
        $this->addListEntityItem($child, $plural, 'acp.translation.domain.list');
        $this->addAddEntityItem($child, $singular, 'acp.translation.domain.add', [], [
            'extras' => [
                'routes' => [
                    'acp.translation.domain.edit'
                ]
            ]
        ]);

        $singular = $this->translator->trans('translation.token.object.singular', [], 'entities');
        $plural = $this->translator->trans('translation.token.object.plural', [], 'entities');

        $this->getMenuBuilderService()->addDivider($child);

        $this->addHeader($child, $plural);
        $this->addListEntityItem($child, $plural, 'acp.translation.token.list');
        $this->addAddEntityItem($child, $singular, 'acp.translation.token.add', [], [
            'extras' => [
                'routes' => [
                    'acp.translation.token.edit'
                ]
            ]
        ]);

        $singular = $this->translator->trans('translation.object.singular', [], 'entities');
        $plural = $this->translator->trans('translation.object.plural', [], 'entities');

        $this->getMenuBuilderService()->addDivider($child);

        $this->addHeader($child, $plural);
        $this->addListEntityItem($child, $plural, 'acp.translation.list');
        $this->addAddEntityItem($child, $singular, 'acp.translation.add', [], [
            'extras' => [
                'routes' => [
                    'acp.translation.edit'
                ]
            ]
        ]);
    }
}