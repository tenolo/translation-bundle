<?php

namespace Tenolo\Bundle\TranslationBundle\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Tenolo\Bundle\CRUDAdminBundle\Controller\CRUDController;
use Tenolo\Bundle\CRUDBundle\Controller\CRUDs\CRUDEdit;
use Tenolo\Bundle\CRUDBundle\Controller\CRUDs\CRUDList;
use Tenolo\Bundle\CRUDBundle\Controller\CRUDs\CRUDRemove;
use Tenolo\Bundle\TranslationBundle\CRUD\Configurator\TokenConfigurator;

/**
 * Class TokenController
 *
 * @package Tenolo\Bundle\TranslationBundle\Controller
 * @author  Nikita Loges
 *
 * @Route("/translation/token", name="tenolo_translation_token")
 */
class TokenController extends CRUDController
{

    use CRUDList;
    use CRUDEdit;
    use CRUDRemove;

    /**
     * @inheritDoc
     */
    protected function getConfiguratorName()
    {
        return TokenConfigurator::class;
    }
} 