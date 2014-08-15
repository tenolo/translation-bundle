<?php

namespace Tenolo\TranslationBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Tenolo\AdminControlPanelBundle\Controller\BaseController;
use Symfony\Component\Routing\Annotation\Route;

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
    protected $entityRepository = "TenoloTranslationBundle:Language";

    /** @{inheritdoc} */
    protected $formType = 'Tenolo\TranslationBundle\Form\Type\LanguageType';

    /** @{inheritdoc} */
    protected $icon = "flag";

    /** @{inheritdoc} */
    protected $listSearchableParams = array('name');

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
     * {@inheritdoc}
     */
    protected function initControllerActions() {
        parent::initControllerActions();

        $this->addControllerActions(array(
            'clearCache'
        ));
    }

    /**
     * @Route("/cache/clear", name="cache.clear")
     */
    public function clearCacheAction() {
        $this->get('tenolo_translation.service')->clearLanguageCache();
        $this->get('tenolo_translation.service')->renewLanguageFakeFiles();

        return new RedirectResponse($this->generateUrl($this->routes['list']));
    }
} 