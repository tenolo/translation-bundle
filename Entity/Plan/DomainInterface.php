<?php

namespace Tenolo\Bundle\TranslationBundle\Entity\Plan;

use Doctrine\Common\Collections\Collection;
use Tenolo\Bundle\CoreBundle\Entity\Plan\BaseEntityInterface;
use Tenolo\Bundle\CoreBundle\Entity\Scheme\NameInterface;

/**
 * Class DomainInterface
 * @package Tenolo\Bundle\TranslationBundle\Entity\Plan
 * @author Nikita Loges, tenolo GbR
 */
interface DomainInterface extends BaseEntityInterface, NameInterface {

    /**
     * @return Collection|TokenInterface[]
     */
    public function getTokens();
}