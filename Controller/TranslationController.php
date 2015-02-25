<?php

namespace Tenolo\Bundle\TranslationBundle\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Tenolo\Bundle\AdminControlPanelBundle\Controller\BaseController;
use Tenolo\Bundle\CoreBundle\Controller\REST\EditAction;

/**
 * Class TranslationController
 * @package Tenolo\Bundle\TranslationBundle\Controller
 * @author Nikita Loges
 *
 * @Route("/translation", name="acp.translation")
 */
class TranslationController extends BaseController
{

    use EditAction;

    /** @{inheritdoc} */
    protected $entityName = "TenoloTranslationBundle:Translation";

    /** @{inheritdoc} */
    protected $formTypeClassName = 'Tenolo\Bundle\TranslationBundle\Form\Type\TranslationType';

    /** @{inheritdoc} */
    protected $icon = "flag";

    /**
     * @{inheritdoc}
     */
    protected function getWording()
    {
        return array(
            'article' => array(
                'singular' => 'translation.article.singular',
                'plural' => 'translation.article.plural',
            ),
            'object' => array(
                'singular' => 'translation.object.singular',
                'plural' => 'translation.object.plural',
            )
        );
    }
} 