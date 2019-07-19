<?php

namespace Tenolo\Bundle\TranslationBundle\Entity\Plan;

use Doctrine\Common\Collections\Collection;
use Tenolo\Bundle\EntityBundle\Entity\Interfaces\BaseEntityInterface;
use Tenolo\Bundle\EntityBundle\Entity\Interfaces\NameInterface;

/**
 * Interface DomainInterface
 * @package Tenolo\Bundle\TranslationBundle\Entity\Plan
 * @author Nikita Loges
 * @company tenolo GbR
 */
interface DomainInterface extends BaseEntityInterface, NameInterface
{

    /**
     * @return Collection|TokenInterface[]
     */
    public function getTokens();
}