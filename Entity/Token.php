<?php

namespace Tenolo\Bundle\TranslationBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Tenolo\Bundle\CoreBundle\Entity\BaseEntity;
use Tenolo\Bundle\CoreBundle\Entity\Scheme\Name;
use Tenolo\Bundle\DoctrineTablePrefixBundle\Doctrine\Annotations as TDTPA;

/**
 * Class Token
 * @package Tenolo\Bundle\TranslationBundle\Entity
 * @author Nikita Loges
 *
 * @ORM\Entity(repositoryClass="Tenolo\Bundle\TranslationBundle\Repository\TokenRepository")
 * @ORM\HasLifecycleCallbacks
 * @TDTPA\Prefix(name="language")
 */
class Token extends BaseEntity
{
    use Name;

    /**
     * @var Domain
     *
     * @ORM\ManyToOne(targetEntity="Domain", inversedBy="tokens")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $domain;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Translation", mappedBy="token", cascade={"persist", "remove"})
     */
    protected $translations;

    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        parent::__construct();

        $this->translations = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getTranslations()
    {
        return $this->translations;
    }

    /**
     * @param Domain $domain
     * @return $this
     */
    public function setDomain(Domain $domain)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * @return Domain
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getDomain()->getName() . ': ' . $this->getName();
    }
} 