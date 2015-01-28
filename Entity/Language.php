<?php

namespace Tenolo\Bundle\TranslationBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Intl\Intl;
use Symfony\Component\Validator\Constraints as Assert;
use Tenolo\Bundle\CoreBundle\Entity\BaseEntity;

/**
 * Class Language
 * @package Tenolo\Bundle\TranslationBundle\Entity
 * @author Nikita Loges
 *
 * @ORM\Entity(repositoryClass="Tenolo\Bundle\TranslationBundle\Repository\LanguageRepository")
 * @ORM\HasLifecycleCallbacks
 * @UniqueEntity(fields={"locale"}, message="Jede Sprache kann nur einmal verwendet werden.")
 */
class Language extends BaseEntity
{

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    protected $locale;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Translation", mappedBy="language", cascade={"persist", "remove"})
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
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     * @return $this
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getName() {
        return $this->getLocaleBundle()->getLocaleName($this->getLocale());
    }

    /**
     * @return \Symfony\Component\Intl\ResourceBundle\LocaleBundleInterface
     */
    protected function getLocaleBundle() {
        return Intl::getLocaleBundle();
    }

} 