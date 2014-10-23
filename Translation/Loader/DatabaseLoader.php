<?php

namespace Tenolo\TranslationBundle\Translation\Loader;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Translation\Loader\LoaderInterface;
use Symfony\Component\Translation\MessageCatalogue;
use Tenolo\TranslationBundle\Entity\Language;
use Tenolo\TranslationBundle\Entity\Domain;
use Tenolo\TranslationBundle\Entity\Translation;
use Tenolo\TranslationBundle\Repository\DomainRepository;
use Tenolo\TranslationBundle\Repository\LanguageRepository;
use Tenolo\TranslationBundle\Repository\TranslationRepository;

/**
 * Class DatabaseLoader
 * @package Tenolo\CoreBundle\Translation\Loader
 * @author Nikita Loges
 * @company tenolo GbR
 * @date 05.08.14
 */
class DatabaseLoader implements LoaderInterface
{

    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var TranslationRepository
     */
    protected $translationRepository;

    /**
     * @var DomainRepository
     */
    protected $domainRepository;

    /**
     * @var LanguageRepository
     */
    protected $languageRepository;

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
        $this->translationRepository = $em->getRepository("TenoloTranslationBundle:Translation");
        $this->domainRepository = $em->getRepository("TenoloTranslationBundle:Domain");
        $this->languageRepository = $em->getRepository("TenoloTranslationBundle:Language");
    }

    /**
     * @return LanguageRepository
     */
    protected function getLanguageRepository()
    {
        return $this->languageRepository;
    }

    /**
     * @return TranslationRepository
     */
    protected function getTranslationRepository()
    {
        return $this->translationRepository;
    }

    /**
     * @return TranslationRepository
     */
    protected function getDomainRepository()
    {
        return $this->domainRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function load($resource, $locale, $domainName = 'messages')
    {
        // create catalogue
        $catalogue = new MessageCatalogue($locale);

        /**
         * load on the db for the specified local
         * @var Language $language
         */
        $language = $this->getLanguageRepository()->findOneBy(array(
            'locale' => $locale
        ));

        /** @var Domain $domain */
        $domain = $this->getDomainRepository()->findOneBy(array(
            'name' => $domainName
        ));

        if(!$language || !$domain) {
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