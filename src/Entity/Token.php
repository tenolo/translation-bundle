<?php

namespace Tenolo\Bundle\TranslationBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Tenolo\Bundle\CoreBundle\Entity\BaseEntity;
use Tenolo\Bundle\CoreBundle\Entity\Scheme\Name;
use Tenolo\Bundle\DoctrineTablePrefixBundle\Doctrine\Annotations as TDTPA;
use Tenolo\Bundle\TranslationBundle\Entity\Plan\DomainInterface;
use Tenolo\Bundle\TranslationBundle\Entity\Plan\TranslationInterface;

/**
 * Class Token
 * @package Tenolo\Bundle\TranslationBundle\Entity
 * @author Nikita Loges
 * @company tenolo GbR
 *
 * @TDTPA\Prefix(name="translation")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Token extends BaseEntity
{
    use Name;

    /**
     * @var DomainInterface
     * @ORM\ManyToOne(targetEntity="Tenolo\Bundle\TranslationBundle\Entity\Plan\DomainInterface", inversedBy="tokens")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $domain;

    /**
     * @var Collection|TranslationInterface
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
    public function setDomain(Domain $domain)
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