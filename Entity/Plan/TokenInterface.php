<?php

namespace Tenolo\Bundle\TranslationBundle\Entity\Plan;

use Doctrine\Common\Collections\Collection;
use Tenolo\Bundle\CoreBundle\Entity\Plan\BaseEntityInterface;
use Tenolo\Bundle\CoreBundle\Entity\Scheme\NameInterface;

/**
 * Class TokenInterface
 * @package Tenolo\Bundle\TranslationBundle\Entity\Plan
 * @author Nikita Loges, tenolo GbR
 */
interface TokenInterface extends BaseEntityInterface, NameInterface {

    /**
     * @return Collection|TranslationInterface
     */
    public function getTranslations();

    /**
     * @param DomainInterface $domain
     */
    public function setDomain(DomainInterface $domain);

    /**
     * @return DomainInterface
     */
    public function getDomain();

    /**
     * @return string
     */
    public function __toString();
}