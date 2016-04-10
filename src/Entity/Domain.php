<?php

namespace Tenolo\Bundle\TranslationBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Tenolo\Bundle\CoreBundle\Entity\BaseEntity;
use Tenolo\Bundle\CoreBundle\Entity\Scheme\Name;
use Tenolo\Bundle\TranslationBundle\Entity\Plan\DomainInterface;
use Tenolo\Bundle\TranslationBundle\Entity\Plan\TokenInterface;

/**
 * Class Domain
 * @package Tenolo\Bundle\TranslationBundle\Entity
 * @author Nikita Loges
 * @company tenolo GbR
 *
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Domain extends BaseEntity implements DomainInterface
{
    use Name;

    /**
     * @var Collection|TokenInterface[]
     * @ORM\OneToMany(targetEntity="Tenolo\Bundle\TranslationBundle\Entity\Plan\TokenInterface", mappedBy="domain", cascade={"persist", "remove"})
     */
    protected $tokens;

    /**
     * @inheritdoc
     */
    public function __construct()
    {
        parent::__construct();

        $this->tokens = new ArrayCollection();
    }

    /**
     * @inheritdoc
     */
    public function getTokens()
    {
        return $this->tokens;
    }
} 