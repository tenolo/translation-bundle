<?php

namespace Tenolo\Bundle\TranslationBundle\Service;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpKernel\KernelInterface;

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

    /**
     * @param KernelInterface $kernel
     */
    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
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
}