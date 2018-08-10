<?php

namespace Tenolo\Bundle\TranslationBundle\EventListener;

use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Common\Persistence\ObjectRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Translation\Translator;
use Tenolo\Bundle\EntityBundle\Repository\BaseEntityRepository;
use Tenolo\Bundle\TranslationBundle\Entity\Plan\DomainInterface;
use Tenolo\Bundle\TranslationBundle\Entity\Plan\LanguageInterface;

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
            KernelEvents::REQUEST => 'addResources'
        ];
    }

    /**
     * @param GetResponseEvent $event
     */
    public function addResources(GetResponseEvent $event)
    {
        /** @var LanguageInterface[] $languages */
        $languages = $this->getLanguageRepository()->findAll();

        /** @var DomainInterface[] $domains */
        $domains = $this->getDomainRepository()->findAll();

        // iterate languages and domains
        foreach ($languages as $language) {
            foreach ($domains as $domain) {
                $file = $domain->getName() . "." . $language->getLocale() . '.db';
                $this->translator->addResource('db', $file, $language->getLocale(), $domain->getName());
            }
        }
    }

    /**
     * @return ObjectRepository|BaseEntityRepository
     */
    protected function getLanguageRepository()
    {
        return $this->registry->getRepository(LanguageInterface::class);
    }

    /**
     * @return ObjectRepository|BaseEntityRepository
     */
    protected function getDomainRepository()
    {
        return $this->registry->getRepository(DomainInterface::class);
    }

}
