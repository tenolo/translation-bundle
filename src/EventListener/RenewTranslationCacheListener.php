<?php

namespace Tenolo\Bundle\TranslationBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Tenolo\Bundle\TranslationBundle\Entity\Plan\DomainInterface;
use Tenolo\Bundle\TranslationBundle\Entity\Plan\LanguageInterface;
use Tenolo\Bundle\TranslationBundle\Entity\Plan\TokenInterface;
use Tenolo\Bundle\TranslationBundle\Entity\Plan\TranslationInterface;
use Tenolo\Bundle\TranslationBundle\Service\TranslationServiceInterface;

/**
 * Class RenewTranslationCacheListener
 *
 * @package Tenolo\Bundle\TranslationBundle\EventListener
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class RenewTranslationCacheListener implements EventSubscriber
{

    /** @var TranslationServiceInterface */
    protected $translationService;

    /**
     * @param TranslationServiceInterface $translationService
     */
    public function __construct(TranslationServiceInterface $translationService)
    {
        $this->translationService = $translationService;
    }

    /**
     * @inheritdoc
     */
    public function getSubscribedEvents()
    {
        return [
            'postPersist',
            'postUpdate',
        ];
    }

    /**
     * @param LifecycleEventArgs $args
     */
    public function postUpdate(LifecycleEventArgs $args)
    {
        $this->renewCache($args->getEntity());
    }

    /**
     * @param LifecycleEventArgs $args
     */
    public function postPersist(LifecycleEventArgs $args)
    {
        $this->renewCache($args->getEntity());
    }

    /**
     * @param $entity
     */
    protected function renewCache($entity)
    {
        if (!$this->isTranslationBundleEntity($entity)) {
            return;
        }

        $this->translationService->clearLanguageCache();
    }

    /**
     * @param $entity
     *
     * @return bool
     */
    protected function isTranslationBundleEntity($entity)
    {
        $entities = [
            DomainInterface::class,
            LanguageInterface::class,
            TokenInterface::class,
            TranslationInterface::class,
        ];

        $ref = new \ReflectionClass($entity);
        foreach ($entities as $e) {
            if ($ref->implementsInterface($e)) {
                return true;
            }
        }

        return false;
    }

}
