<?php

namespace Tenolo\Bundle\TranslationBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;
use Tenolo\Bundle\EntityBundle\Entity\BaseEntity;
use Tenolo\Bundle\EntityBundle\Entity\Scheme\Name;
use Tenolo\Bundle\TranslationBundle\Entity\Plan\DomainInterface;
use Tenolo\Bundle\TranslationBundle\Entity\Plan\TokenInterface;
use Tenolo\Bundle\TranslationBundle\Entity\Plan\TranslationInterface;

/**
 * Class Token
 *
 * @package Tenolo\Bundle\TranslationBundle\Entity
 * @author  Nikita Loges
 * @company tenolo GbR
 *
 * @ORM\Entity
 */
class Token extends BaseEntity implements TokenInterface
{
    use Name;

    /**
     * @var DomainInterface
     * @ORM\ManyToOne(targetEntity="Tenolo\Bundle\TranslationBundle\Entity\Plan\DomainInterface", inversedBy="tokens")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $domain;

    /**
     * @var ArrayCollection|PersistentCollection|TranslationInterface
     * @ORM\OneToMany(targetEntity="Tenolo\Bundle\TranslationBundle\Entity\Plan\TranslationInterface", mappedBy="token", cascade={"persist", "remove"})
     */
    protected $translations;

    /**
     * @inheritdoc
     */
    public function __construct()
    {
        parent::__construct();

        $this->translations = new ArrayCollection();
    }

    /**
     * @inheritdoc
     */
    public function getTranslations()
    {
        return $this->translations;
    }

    /**
     * @inheritdoc
     */
    public function setDomain(DomainInterface $domain)
    {
        $this->domain = $domain;
    }

    /**
     * @inheritdoc
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return $this->getDomain()->getName() . ': ' . $this->getName();
    }
} 