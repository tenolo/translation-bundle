<?php

namespace Tenolo\Bundle\TranslationBundle\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Tenolo\Bundle\AdminControlPanelBundle\Controller\BaseController;
use Tenolo\Bundle\CoreBundle\Controller\REST\EditAction;
use Tenolo\Bundle\CoreBundle\Controller\REST\MarkAction;
use Tenolo\Bundle\CoreBundle\Controller\REST\RemoveAction;
use Tenolo\Bundle\TranslationBundle\Entity\Language;
use Tenolo\Bundle\TranslationBundle\Form\Type\LanguageType;

/**
 * Class LanguageController
 *
 * @package Tenolo\Bundle\TranslationBundle\Controller
 * @author  Nikita Loges
 *
 * @Route("/translation/language", name="acp.translation.language")
 */
class LanguageController extends BaseController
{

    use EditAction;
    use RemoveAction;
    use MarkAction;

    /** @{inheritdoc} */
    protected $entityName = Language::class;

    /** @{inheritdoc} */
    protected $formTypeClassName = LanguageType::class;

    /** @{inheritdoc} */
    protected $icon = "flag";

    /**
     * @{inheritdoc}
     */
    protected function getWording()
    {
        return [
            'article' => [
                'singular' => 'translation.language.article.singular',
                'plural'   => 'translation.language.article.plural',
            ],
            'object'  => [
                'singular' => 'translation.language.object.singular',
                'plural'   => 'translation.language.object.plural',
            ]
        ];
    }
} 