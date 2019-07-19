<?php

namespace Tenolo\Bundle\TranslationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Tenolo\Bundle\EntityBundle\Entity\BaseEntity;

/**
 * Class Translation
 *
 * @package Tenolo\Bundle\TranslationBundle\Entity
 * @author  Nikita Loges
 * @company tenolo GbR
 *
 * @ORM\Entity(repositoryClass="Tenolo\Bundle\TranslationBundle\Repository\TranslationRepository")
 * @UniqueEntity(fields={"token", "language"}, message="Es kein nur eine Übersetzung pro Token und Sprache angelegt werden.")
 */
class Translation extends BaseEntity implements TranslationInterface
{

    /**
     * @var TokenInterface
     * @ORM\ManyToOne(targetEntity="Tenolo\Bundle\TranslationBundle\Entity\TokenInterface", inversedBy="translations")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $token;

    /**
     * @var LanguageInterface
     * @ORM\ManyToOne(targetEntity="Tenolo\Bundle\TranslationBundle\Entity\LanguageInterface", inversedBy="translations")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $language;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $translation;

    /**
     * @inheritdoc
     */
    public function setTranslation($translation)
    {
        $this->translation = $translation;
    }

    /**
     * @inheritdoc
     */
    public function getTranslation()
    {
        return $this->translation;
    }

    /**
     * @inheritdoc
     */
    public function setToken(TokenInterface $token)
    {
        $this->token = $token;
    }

    /**
     * @inheritdoc
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @inheritdoc
     */
    public function setLanguage(LanguageInterface $language)
    {
        $this->language = $language;
    }

    /**
     * @inheritdoc
     */
    public function getLanguage()
    {
        return $this->language;
    }
}