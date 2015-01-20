<?php

namespace Tenolo\Bundle\TranslationBundle\Service;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Tenolo\Bundle\CoreBundle\Service\AbstractService;
use Tenolo\Bundle\TranslationBundle\Entity\Domain;
use Tenolo\Bundle\TranslationBundle\Entity\Language;

/**
 * Class TranslationService
 * @package Tenolo\Bundle\TranslationBundle\Service
 * @author Nikita Loges
 * @company tenolo GbR
 * @date 06.08.14
 */
class TranslationService extends AbstractService
{

    /**
     *
     */
    public function renewLanguageFakeFiles()
    {
        // find need data
        $languages = $this->getLanguageRepository()->matchingAll();
        $domains = $this->getDomainRepository()->matchingAll();

        // file collection
        $languageFiles = new ArrayCollection();

        // filesystem
        $filesystem = new Filesystem();

        // dirs
        $appDir = $this->getKernel()->getRootDir();
        $subDir = '/Resources/translations/';
        $completeDir = $appDir . $subDir;

        // make dir
        if (!$filesystem->exists($completeDir)) {
            $filesystem->mkdir($completeDir);
        }

        // find old language files
        $finder = new Finder();
        $finder->in(array($completeDir))->files()->name('*.db');

        // iterate languages and domains
        foreach ($languages as $language) {
            foreach ($domains as $domain) {
                /**
                 * @var Language $language
                 * @var Domain $domain
                 */

                // add file
                $languageFiles->add($completeDir . $domain->getName() . "." . $language->getLocale() . '.db');
            }
        }

        // remove old files
        $filesystem->remove($finder);

        // touch all files
        $filesystem->touch($languageFiles);
    }

    /**
     *
     */
    public function clearLanguageCache()
    {
        // get cache dir
        $cache = $this->getKernel()->getCacheDir();

        $translationDir = $cache . "/translations";

        $finder = new Finder();
        $filesystem = new Filesystem();

        if ($filesystem->exists($translationDir)) {

            // remove all files
            $finder->in(array($translationDir))->files();
            $filesystem->remove($finder);

            $filesystem->remove($translationDir);
        }
    }

    /**
     * @return \Tenolo\Bundle\TranslationBundle\Repository\LanguageRepository
     */
    protected function getLanguageRepository()
    {
        return $this->getEntityManager()->getRepository('TenoloTranslationBundle:Language');
    }

    /**
     * @return \Tenolo\Bundle\TranslationBundle\Repository\DomainRepository
     */
    protected function getDomainRepository()
    {
        return $this->getEntityManager()->getRepository('TenoloTranslationBundle:Domain');
    }
}