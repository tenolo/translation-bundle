<?php

namespace Tenolo\Bundle\TranslationBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Intl\Intl;
use Symfony\Component\Validator\Constraints as Assert;
use Tenolo\Bundle\CoreBundle\Entity\BaseEntity;
use Tenolo\Bundle\TranslationBundle\Entity\Plan\LanguageInterface;
use Tenolo\Bundle\TranslationBundle\Entity\Plan\TranslationInterface;
use Tenolo\Bundle\DoctrineTablePrefixBundle\Doctrine\Annotations as TDTPA;

/**
 * Class Language
 * @package Tenolo\Bundle\TranslationBundle\Entity
 * @author Nikita Loges
 * @company tenolo GbR
 *
 * @TDTPA\Prefix(name="translation")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @UniqueEntity(fields={"locale"}, message="Jede Sprache kann nur einmal verwendet werden.")
 */
class Language extends BaseEntity implements LanguageInterface
{

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $locale;

    /**
     * @var Collection|TranslationInterface[]
     * @ORM\OneToMany(targetEntity="Tenolo\Bundle\TranslationBundle\Entity\Plan\TranslationInterface", mappedBy="language", cascade={"persist", "remove"})
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
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @inheritdoc
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return $this->getLocaleBundle()->getLocaleName($this->getLocale());
    }

    /**
     * @inheritdoc
     */
    protected function getLocaleBundle()
    {
        return Intl::getLocaleBundle();
    }

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return $this->getName();
    }

} 