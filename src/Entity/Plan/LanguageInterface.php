<?php

namespace Tenolo\Bundle\TranslationBundle\Entity\Plan;

use Doctrine\Common\Collections\Collection;
use Tenolo\Bundle\EntityBundle\Entity\Interfaces\BaseEntityInterface;

/**
 * Interface LanguageInterface
 * @package Tenolo\Bundle\TranslationBundle\Entity\Plan
 * @author Nikita Loges
 * @company tenolo GbR
 */
interface LanguageInterface extends BaseEntityInterface
{

    /**
     * @return Collection|TranslationInterface[]
     */
    public function getTranslations();

    /**
     * @return string
     */
    public function getLocale();

    /**
     * @param string $locale
     */
    public function setLocale($locale);

    /**
     * @return null|string
     */
    public function getName();

    /**
     * @return string
     */
    public function __toString();
}