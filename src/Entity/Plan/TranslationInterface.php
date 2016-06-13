<?php

namespace Tenolo\Bundle\TranslationBundle\Entity\Plan;

use Tenolo\Bundle\CoreBundle\Entity\Plan\BaseEntityInterface;

/**
 * Interface TranslationInterface
 * @package Tenolo\Bundle\TranslationBundle\Entity\Plan
 * @author Nikita Loges
 * @company tenolo GbR
 */
interface TranslationInterface extends BaseEntityInterface
{

    /**
     * @param string $translation
     * @return $this
     */
    public function setTranslation($translation);

    /**
     * @return string
     */
    public function getTranslation();

    /**
     * @param TokenInterface $token
     */
    public function setToken(TokenInterface $token);

    /**
     * @return TokenInterface
     */
    public function getToken();

    /**
     * @param LanguageInterface $language
     */
    public function setLanguage(LanguageInterface $language);

    /**
     * @return LanguageInterface
     */
    public function getLanguage();
}