<?php

namespace Tenolo\Bundle\TranslationBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Tenolo\Bundle\CoreBundle\Entity\BaseEntity;
use Tenolo\Bundle\CoreBundle\Entity\Scheme\Name;
use Tenolo\Bundle\DoctrineTablePrefixBundle\Doctrine\Annotations as TDTPA;

/**
 * Class Domain
 * @package Tenolo\Bundle\CoreBundle\Entity
 * @author Nikita Loges
 *
 * @ORM\Entity(repositoryClass="Tenolo\Bundle\TranslationBundle\Repository\DomainRepository")
 * @ORM\HasLifecycleCallbacks
 * @TDTPA\Prefix(name="language")
 */
class Domain extends BaseEntity
{
    use Name;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Tenolo\Bundle\TranslationBundle\Entity\Token", mappedBy="domain", cascade={"persist", "remove"})
     */
    protected $tokens;

    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        parent::__construct();

        $this->tokens = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getTokens()
    {
        return $this->tokens;
    }
} 