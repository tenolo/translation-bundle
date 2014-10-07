<?php

namespace Tenolo\TranslationBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Tenolo\CoreBundle\Entity\BaseEntity;
use Tenolo\CoreBundle\Entity\Scheme\Name;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Language
 * @package Tenolo\TranslationBundle\Entity
 * @author Nikita Loges
 *
 * @ORM\Entity(repositoryClass="Tenolo\TranslationBundle\Repository\LanguageRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Language extends BaseEntity
{
    use Name;

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

} 