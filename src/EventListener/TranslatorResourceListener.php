<?php

namespace Tenolo\Bundle\TranslationBundle\EventListener;

use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Translation\Translator;
use Tenolo\Bundle\TranslationBundle\Entity\DomainInterface;
use Tenolo\Bundle\TranslationBundle\Entity\LanguageInterface;

/**
 * Class TranslatorResourceListener
 *
 * @package Tenolo\Bundle\TranslationBundle\EventListener
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class TranslatorResourceListener implements EventSubscriberInterface
{

    /** @var Translator */
    protected $translator;

    /** @var ManagerRegistry */
    protected $registry;

    /**
     * @param Translator      $translator
     * @param ManagerRegistry $registry
     */
    public function __construct(Translator $translator, ManagerRegistry $registry)
    {
        $this->translator = $translator;
        $this->registry = $registry;
    }

    /**
     * @inheritdoc
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::REQUEST => 'addResources',
        ];
    }

    /**
     * @param GetResponseEvent $event
     */
    public function addResources(GetResponseEvent $event)
    {
        $langRepo = $this->registry->getRepository(LanguageInterface::class);
        $domainRepo = $this->registry->getRepository(DomainInterface::class);

        /** @var LanguageInterface[] $languages */
        $languages = $langRepo->findAll();

        /** @var DomainInterface[] $domains */
        $domains = $domainRepo->findAll();

        // iterate languages and domains
        foreach ($languages as $language) {
            foreach ($domains as $domain) {
                $file = $domain->getName().".".$language->getLocale().'.db';
                $this->translator->addResource('db', $file, $language->getLocale(), $domain->getName());
            }
        }
    }

}
