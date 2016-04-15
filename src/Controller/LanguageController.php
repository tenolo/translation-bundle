<?php

namespace Tenolo\Bundle\TranslationBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Tenolo\Bundle\AdminControlPanelBundle\Controller\BaseController;
use Tenolo\Bundle\CoreBundle\Controller\REST\EditAction;
use Tenolo\Bundle\CoreBundle\Controller\REST\RemoveAction;
use Tenolo\Bundle\CoreBundle\Controller\REST\MarkAction;
use Tenolo\Bundle\TranslationBundle\Form\Type\LanguageType;

/**
 * Class LanguageController
 * @package Tenolo\Bundle\TranslationBundle\Controller
 * @author Nikita Loges
 *
 * @Route("/translation/language", name="tenolo_translation_acp_language")
 */
class LanguageController extends BaseController
{

    use EditAction;
    use RemoveAction;
    use MarkAction;

    /** @{inheritdoc} */
    protected $entityName = "TenoloTranslationBundle:Language";

    /** @{inheritdoc} */
    protected $formType = LanguageType::class;

    /** @{inheritdoc} */
    protected $icon = "flag";

    /**
     * @Route("/cache/clear", name="cache_clear")
     */
    public function clearCacheAction()
    {
        $this->get('tenolo_translation.service')->clearLanguageCache();
        $this->get('tenolo_translation.service')->renewLanguageFakeFiles();

        return new RedirectResponse($this->generateUrl($this->routes['list']));
    }

    /**
     * @{inheritdoc}
     */
    protected function getWording()
    {
        return array(
            'article' => array(
                'singular' => 'translation.language.article.singular',
                'plural' => 'translation.language.article.plural',
            ),
            'object' => array(
                'singular' => 'translation.language.object.singular',
                'plural' => 'translation.language.object.plural',
            )
        );
    }
} 