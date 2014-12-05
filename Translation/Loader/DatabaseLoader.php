<?php

namespace Tenolo\TranslationBundle\Translation\Loader;

use Symfony\Component\Translation\Loader\LoaderInterface;
use Symfony\Component\Translation\MessageCatalogue;
use Tenolo\CoreBundle\Service\AbstractService;
use Tenolo\TranslationBundle\Entity\Domain;
use Tenolo\TranslationBundle\Entity\Language;
use Tenolo\TranslationBundle\Entity\Translation;

/**
 * Class DatabaseLoader
 * @package Tenolo\CoreBundle\Translation\Loader
 * @author Nikita Loges
 * @company tenolo GbR
 * @date 05.08.14
 */
class DatabaseLoader extends AbstractService implements LoaderInterface
{

    /**
     * @return \Tenolo\TranslationBundle\Repository\TranslationRepository
     */
    protected function getTranslationRepository()
    {
        return $this->getEntityManager()->getRepository('TenoloTranslationBundle:Translation');
    }

    /**
     * @return \Tenolo\TranslationBundle\Repository\LanguageRepository
     */
    protected function getLanguageRepository()
    {
        return $this->getEntityManager()->getRepository('TenoloTranslationBundle:Language');
    }

    /**
     * @return \Tenolo\TranslationBundle\Repository\DomainRepository
     */
    protected function getDomainRepository()
    {
        return $this->getEntityManager()->getRepository('TenoloTranslationBundle:Domain');
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