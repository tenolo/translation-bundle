<?php

namespace Tenolo\TranslationBundle\Service;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Tenolo\TranslationBundle\Entity\Domain;
use Tenolo\TranslationBundle\Entity\Language;

/**
 * Class TranslationService
 * @package Tenolo\TranslationBundle\Service
 * @author Nikita Loges
 * @company tenolo GbR
 * @date 06.08.14
 */
class TranslationService
{

    /**
     * @var \AppKernel
     */
    private $kernel;

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @param \AppKernel $kernel
     * @param EntityManager $em
     */
    public function __construct(\AppKernel $kernel, EntityManager $em)
    {
        $this->kernel = $kernel;
        $this->em = $em;
    }

    /**
     *
     */
    public function renewLanguageFakeFiles()
    {
        // find need data
        $languages = $this->em->getRepository('TenoloTranslationBundle:Language')->matchingAll();
        $domains = $this->em->getRepository('TenoloTranslationBundle:Domain')->matchingAll();

        // file collection
        $languageFiles = new ArrayCollection();

        // filesystem
        $filesystem = new Filesystem();

        // dirs
        $appDir = $this->kernel->getRootDir();
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
        $cache = $this->kernel->getCacheDir();

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
}