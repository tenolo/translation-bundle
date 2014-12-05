<?php

namespace Tenolo\TranslationBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Tenolo\AdminControlPanelBundle\Controller\BaseController;

/**
 * Class LanguageController
 * @package Tenolo\TranslationBundle\Controller
 * @author Nikita Loges
 *
 * @Route("/translation/language", name="acp.translation.language")
 */
class LanguageController extends BaseController
{

    /** @{inheritdoc} */
    protected $entityName = "TenoloTranslationBundle:Language";

    /** @{inheritdoc} */
    protected $formTypeClassName = 'Tenolo\TranslationBundle\Form\Type\LanguageType';

    /** @{inheritdoc} */
    protected $icon = "flag";

    /** @{inheritdoc} */
    protected $listSearchableParams = array('locale');

    /** @{inheritdoc} */
    protected $wording = array(
        'article' => array(
            'singular' => 'translation.language.article.singular',
            'plural' => 'translation.language.article.plural',
        ),
        'object' => array(
            'singular' => 'translation.language.object.singular',
            'plural' => 'translation.language.object.plural',
        )
    );

    /**
     * @Route("/cache/clear", name="cache.clear")
     */
    public function clearCacheAction()
    {
        $this->get('tenolo_translation.service')->clearLanguageCache();
        $this->get('tenolo_translation.service')->renewLanguageFakeFiles();

        return new RedirectResponse($this->generateUrl($this->routes['list']));
    }
} 