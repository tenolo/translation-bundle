<?php

namespace Tenolo\Bundle\TranslationBundle\Translation\Loader;

use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Common\Persistence\ObjectRepository;
use Symfony\Component\Translation\Loader\LoaderInterface;
use Symfony\Component\Translation\MessageCatalogue;
use Tenolo\Bundle\EntityBundle\Repository\Interfaces\BaseEntityRepositoryInterface;
use Tenolo\Bundle\TranslationBundle\Entity\Domain;
use Tenolo\Bundle\TranslationBundle\Entity\Language;
use Tenolo\Bundle\TranslationBundle\Entity\Plan\DomainInterface;
use Tenolo\Bundle\TranslationBundle\Entity\Plan\LanguageInterface;
use Tenolo\Bundle\TranslationBundle\Entity\Plan\TranslationInterface;
use Tenolo\Bundle\TranslationBundle\Entity\Translation;
use Tenolo\Bundle\TranslationBundle\Repository\TranslationRepository;

/**
 * Class DatabaseLoader
 *
 * @package Tenolo\Bundle\CoreBundle\Translation\Loader
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class DatabaseLoader implements LoaderInterface
{

    /** @var ManagerRegistry */
    protected $registry;

    /**
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        $this->registry = $registry;
    }

    /**
     * @return ObjectRepository|TranslationRepository
     */
    protected function getTranslationRepository()
    {
        return $this->registry->getRepository(TranslationInterface::class);
    }

    /**
     * @return ObjectRepository|BaseEntityRepositoryInterface
     */
    protected function getLanguageRepository()
    {
        return $this->registry->getRepository(LanguageInterface::class);
    }

    /**
     * @return ObjectRepository|BaseEntityRepositoryInterface
     */
    protected function getDomainRepository()
    {
        return $this->registry->getRepository(DomainInterface::class);
    }

    /**
     * @inheritdoc
     */
    public function load($resource, $locale, $domainName = 'messages')
    {
        // create catalogue
        $catalogue = new MessageCatalogue($locale);

        /**
         * load on the db for the specified local
         *
         * @var Language $language
         */
        $language = $this->getLanguageRepository()->findOneBy([
            'locale' => $locale
        ]);

        /** @var Domain $domain */
        $domain = $this->getDomainRepository()->findOneBy([
            'name' => $domainName
        ]);

        if (!$language || !$domain) {
            return $catalogue;
        }

        // get all translations for this language and domain
        $translations = $this->getTranslationRepository()->findAllByLanguageAndDomain($language, $domain);

        /** @var $translation Translation */
        foreach ($translations as $translation) {
            $catalogue->set($translation->getToken()->getName(), $translation->getTranslation(), $domain->getName());
        }

        return $catalogue;
    }
} 