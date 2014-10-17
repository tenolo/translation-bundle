<?php

namespace Tenolo\TranslationBundle\Controller;

use Tenolo\AdminControlPanelBundle\Controller\BaseController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TranslationController
 * @package Tenolo\TranslationBundle\Controller
 * @author Nikita Loges
 *
 * @Route("/translation", name="acp.translation")
 */
class TranslationController extends BaseController
{

    /** @{inheritdoc} */
    protected $entityName = "TenoloTranslationBundle:Translation";

    /** @{inheritdoc} */
    protected $formTypeClassName = 'Tenolo\TranslationBundle\Form\Type\TranslationType';

    /** @{inheritdoc} */
    protected $icon = "flag";

    /** @{inheritdoc} */
    protected $listSearchableParams = array('name');

    /** @{inheritdoc} */
    protected $wording = array(
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