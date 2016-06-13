<?php

namespace Tenolo\Bundle\TranslationBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Tenolo\Bundle\CRUDAdminBundle\Controller\CRUDController;
use Tenolo\Bundle\CRUDBundle\Controller\CRUDs\CRUDEdit;
use Tenolo\Bundle\CRUDBundle\Controller\CRUDs\CRUDList;
use Tenolo\Bundle\CRUDBundle\Controller\CRUDs\CRUDRemove;
use Tenolo\Bundle\TranslationBundle\CRUD\Configurator\LanguageConfigurator;

/**
 * Class LanguageController
 *
 * @package Tenolo\Bundle\TranslationBundle\Controller
 * @author  Nikita Loges
 *
 * @Route("/translation/language", name="tenolo_translation_language")
 */
class LanguageController extends CRUDController
{

    use CRUDList;
    use CRUDEdit;
    use CRUDRemove;

    /**
     * @Route("/cache/clear", name="cache_clear")
     */
    public function clearCacheAction()
    {
        $this->get('tenolo_translation.service')->clearLanguageCache();
        $this->get('tenolo_translation.service')->renewLanguageFakeFiles();

        return new RedirectResponse($this->generateUrl($this->getConfigurator()->getRouteName('list')));
    }

    /**
     * @inheritDoc
     */
    protected function getConfiguratorName()
    {
        return LanguageConfigurator::class;
    }
} 