<?php

namespace Tenolo\Bundle\TranslationBundle\Service;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpKernel\KernelInterface;
use Tenolo\Bundle\TranslationBundle\Entity\Domain;
use Tenolo\Bundle\TranslationBundle\Entity\Language;
use Tenolo\Bundle\TranslationBundle\Entity\Plan\DomainInterface;
use Tenolo\Bundle\TranslationBundle\Entity\Plan\LanguageInterface;

/**
 * Class TranslationService
 *
 * @package Tenolo\Bundle\TranslationBundle\Service
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class TranslationService implements TranslationServiceInterface
{

    /** @var KernelInterface */
    protected $kernel;

    /** @var ManagerRegistry */
    protected $registry;

    /**
     * @param KernelInterface $kernel
     * @param ManagerRegistry $registry
     */
    public function __construct(KernelInterface $kernel, ManagerRegistry $registry)
    {
        $this->kernel = $kernel;
        $this->registry = $registry;
    }

    /**
     *
     */
    public function renewLanguageFakeFiles()
    {
        // find need data
        $languages = $this->getLanguageRepository()->findAll();
        $domains = $this->getDomainRepository()->findAll();

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
        $finder->in([$completeDir])->files()->name('*.db');

        // iterate languages and domains
        foreach ($languages as $language) {
            foreach ($domains as $domain) {
                /**
                 * @var Language $language
                 * @var Domain   $domain
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
            $finder->in([$translationDir])->files();
            $filesystem->remove($finder);

            $filesystem->remove($translationDir);
        }
    }

    /**
     * @return \Tenolo\Bundle\EntityBundle\Repository\BaseEntityRepository
     */
    protected function getLanguageRepository()
    {
        return $this->registry->getRepository(LanguageInterface::class);
    }

    /**
     * @return \Tenolo\Bundle\EntityBundle\Repository\BaseEntityRepository
     */
    protected function getDomainRepository()
    {
        return $this->registry->getRepository(DomainInterface::class);
    }
}