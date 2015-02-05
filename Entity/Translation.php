<?php

namespace Tenolo\Bundle\TranslationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Tenolo\Bundle\CoreBundle\Entity\BaseEntity;
use Tenolo\Bundle\DoctrineTablePrefixBundle\Doctrine\Annotations as TDTPA;
use Tenolo\Bundle\TranslationBundle\Entity\Plan\LanguageInterface;
use Tenolo\Bundle\TranslationBundle\Entity\Plan\TokenInterface;
use Tenolo\Bundle\TranslationBundle\Entity\Plan\TranslationInterface;

/**
 * Class Translation
 * @package Tenolo\Bundle\TranslationBundle\Entity
 * @author Nikita Loges
 *
 * @ORM\Entity(repositoryClass="Tenolo\Bundle\TranslationBundle\Repository\TranslationRepository")
 * @ORM\HasLifecycleCallbacks
 * @TDTPA\Prefix(name="language")
 * @UniqueEntity(fields={"token", "language"}, message="Es kein nur eine Übersetzung pro Token und Sprache angelegt werden.")
 */
class Translation extends BaseEntity implements TranslationInterface
{

    /**
     * @var TokenInterface
     * @ORM\ManyToOne(targetEntity="Token", inversedBy="translations")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $token;

    /**
     * @var LanguageInterface
     * @ORM\ManyToOne(targetEntity="Language", inversedBy="translations")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $language;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $translation;

    /**
     * {@inheritdoc}
     */
    public function setTranslation($translation)
    {
        $this->translation = $translation;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getTranslation()
    {
        return $this->translation;
    }

    /**
     * {@inheritdoc}
     */
    public function setToken(TokenInterface $token)
    {
        $this->token = $token;
    }

    /**
     * {@inheritdoc}
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * {@inheritdoc}
     */
    public function setLanguage(LanguageInterface $language)
    {
        $this->language = $language;
    }

    /**
     * {@inheritdoc}
     */
    public function getLanguage()
    {
        return $this->language;
    }
}