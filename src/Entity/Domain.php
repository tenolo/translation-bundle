<?php

namespace Tenolo\Bundle\TranslationBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Tenolo\Bundle\EntityBundle\Entity\BaseEntity;
use Tenolo\Bundle\EntityBundle\Entity\Scheme\Name;

/**
 * Class Domain
 *
 * @package Tenolo\Bundle\TranslationBundle\Entity
 * @author  Nikita Loges
 * @company tenolo GbR
 *
 * @ORM\Entity
 */
class Domain extends BaseEntity implements DomainInterface
{
    use Name;

    /**
     * @var Collection|TokenInterface[]
     * @ORM\OneToMany(targetEntity="Tenolo\Bundle\TranslationBundle\Entity\TokenInterface", mappedBy="domain", cascade={"persist", "remove"})
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