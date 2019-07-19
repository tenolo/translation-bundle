<?php

namespace Tenolo\Bundle\TranslationBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Intl\Intl;
use Tenolo\Bundle\EntityBundle\Entity\BaseEntity;

/**
 * Class Language
 *
 * @package Tenolo\Bundle\TranslationBundle\Entity
 * @author  Nikita Loges
 * @company tenolo GbR
 *
 * @ORM\Entity
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
     * @ORM\OneToMany(targetEntity="Tenolo\Bundle\TranslationBundle\Entity\TranslationInterface", mappedBy="language", cascade={"persist", "remove"})
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
        $locale = $this->getLocaleBundle()->getLocaleName($this->getLocale());

        if($locale === null) {
            return $this->getLocale();
        }

        return $locale;
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
        return (string)$this->getName();
    }

}