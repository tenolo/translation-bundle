<?php

namespace Tenolo\Bundle\TranslationBundle\Entity;

use Doctrine\Common\Collections\Collection;
use Tenolo\Bundle\EntityBundle\Entity\Interfaces\BaseEntityInterface;
use Tenolo\Bundle\EntityBundle\Entity\Interfaces\NameInterface;

/**
 * Interface TokenInterface
 * @package Tenolo\Bundle\TranslationBundle\Entity
 * @author Nikita Loges
 * @company tenolo GbR
 */
interface TokenInterface extends BaseEntityInterface, NameInterface
{

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
}