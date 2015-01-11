<?php
namespace Tenolo\TranslationBundle\EventListener;

use Shapecode\Bundle\TwigTemplateEventBundle\Event\TwigTemplateEvent;
use Tenolo\CoreBundle\Service\AbstractService;

/**
 * Class TwigTemplateEventListener
 * @package Tenolo\TranslationBundle\EventListener
 * @author Nikita Loges
 * @date 11.01.2015
 */
class TwigTemplateEventListener extends AbstractService
{

    /**
     * @param TwigTemplateEvent $event
     */
    public function onTemplateEvent(TwigTemplateEvent $event)
    {
        switch ($event->getEventName()) {
            case 'sbadmin.topbar.navigtion.left':
                $this->topbarNavigationLeft($event);
                break;
        }
    }

    /**
     * @param TwigTemplateEvent $event
     */
    protected function topbarNavigationLeft(TwigTemplateEvent $event)
    {
        $event->addCode('TenoloTranslationBundle:Layout:navbar-top-left.html.twig');
    }
}