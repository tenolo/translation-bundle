<?php

namespace Tenolo\Bundle\TranslationBundle\EventListener;

use Knp\Menu\ItemInterface;
use Tenolo\Bundle\MenuBundle\Event\MenuBuilderEvent;
use Tenolo\Bundle\MenuBundle\EventListener\BaseMenuStructureListener;

/**
 * Class MenuStructureListener
 *
 * @package Tenolo\Bundle\TranslationBundle\EventListener
 * @author  Nikita Loges
 * @company tenolo GbR
 * @date    16.01.2015
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
        $plural = $this->getEntityTranslation('translation_language.object.plural');

        $child = $root->addChild('tenolo_translation_language', [
            'label'  => $plural,
            'extras' => [
                'icon' => 'flag'
            ]
        ]);

        $this->addHeader($child, $plural);
        $child->addChild('tenolo_translation_language_list', [
            'route'  => 'tenolo_translation_language_list',
            'label'  => $this->getTranslationByDomain('entities', 'translation_language.list'),
            'extras' => [
                'icon' => 'bars'
            ]
        ]);
        $child->addChild('tenolo_translation_language_add', [
            'route'  => 'tenolo_translation_language_add',
            'label'  => $this->getTranslationByDomain('entities', 'translation_language.add'),
            'extras' => [
                'icon'   => 'plus',
                'routes' => [
                    'tenolo_translation_language_edit'
                ]
            ]
        ]);

        $this->getMenuBuilderService()->addDivider($child);

        $this->addHeader($child, $this->getEntityTranslation('translation_domain.object.plural'));
        $child->addChild('tenolo_translation_domain_list', [
            'route'  => 'tenolo_translation_domain_list',
            'label'  => $this->getTranslationByDomain('entities', 'translation_domain.list'),
            'extras' => [
                'icon' => 'bars'
            ]
        ]);
        $child->addChild('tenolo_translation_domain_add', [
            'route'  => 'tenolo_translation_domain_add',
            'label'  => $this->getTranslationByDomain('entities', 'translation_domain.add'),
            'extras' => [
                'icon'   => 'plus',
                'routes' => [
                    'tenolo_translation_domain_edit'
                ]
            ]
        ]);

        $this->getMenuBuilderService()->addDivider($child);

        $this->addHeader($child, $this->getEntityTranslation('translation_token.object.plural'));
        $child->addChild('tenolo_translation_token_list', [
            'route'  => 'tenolo_translation_token_list',
            'label'  => $this->getTranslationByDomain('entities', 'translation_token.list'),
            'extras' => [
                'icon' => 'bars'
            ]
        ]);
        $child->addChild('tenolo_translation_token_add', [
            'route'  => 'tenolo_translation_token_add',
            'label'  => $this->getTranslationByDomain('entities', 'translation_token.add'),
            'extras' => [
                'icon'   => 'plus',
                'routes' => [
                    'tenolo_translation_token_edit'
                ]
            ]
        ]);

        $this->getMenuBuilderService()->addDivider($child);

        $this->addHeader($child, $this->getEntityTranslation('translation.object.plural'));
        $child->addChild('tenolo_translation_translation_list', [
            'route'  => 'tenolo_translation_translation_list',
            'label'  => $this->getTranslationByDomain('entities', 'translation.list'),
            'extras' => [
                'icon' => 'bars'
            ]
        ]);
        $child->addChild('tenolo_translation_translation_add', [
            'route'  => 'tenolo_translation_translation_add',
            'label'  => $this->getTranslationByDomain('entities', 'translation.add'),
            'extras' => [
                'icon'   => 'plus',
                'routes' => [
                    'tenolo_translation_translation_edit'
                ]
            ]
        ]);
    }
}