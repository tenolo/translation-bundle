<?php

namespace Tenolo\Bundle\TranslationBundle\Service;

/**
 * Interface TranslationServiceInterface
 *
 * @package Tenolo\Bundle\TranslationBundle\Service
 * @author  Nikita Loges
 * @company tenolo GbR
 */
interface TranslationServiceInterface
{

    /**
     *
     */
    public function renewLanguageFakeFiles();

    /**
     *
     */
    public function clearLanguageCache();
}
