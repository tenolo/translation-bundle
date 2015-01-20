<?php

namespace Tenolo\Bundle\TranslationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Tenolo\Bundle\CoreBundle\Entity\BaseEntity;
use Tenolo\Bundle\DoctrineTablePrefixBundle\Doctrine\Annotations as TDTPA;

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
class Translation extends BaseEntity
{

    /**
     * @var Token
     *
     * @ORM\ManyToOne(targetEntity="Token", inversedBy="translations")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $token;

    /**
     * @var Language
     *
     * @ORM\ManyToOne(targetEntity="Language", inversedBy="translations")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $language;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $translation;

    /**
     * @param string $translation
     * @return $this
     */
    public function setTranslation($translation)
    {
        $this->translation = $translation;

        return $this;
    }

    /**
     * @return string
     */
    public function getTranslation()
    {
        return $this->translation;
    }

    /**
     * @param Token $token
     * @return $this
     */
    public function setToken(Token $token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * @return Token
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param Language $language
     * @return $this
     */
    public function setLanguage(Language $language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return Language
     */
    public function getLanguage()
    {
        return $this->language;
    }
}