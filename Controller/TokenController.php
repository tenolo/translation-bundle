<?php

namespace Tenolo\TranslationBundle\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Tenolo\AdminControlPanelBundle\Controller\BaseController;

/**
 * Class TokenController
 * @package Tenolo\TranslationBundle\Controller
 * @author Nikita Loges
 *
 * @Route("/translation/token", name="acp.translation.token")
 */
class TokenController extends BaseController
{

    /** @{inheritdoc} */
    protected $entityName = "TenoloTranslationBundle:Token";

    /** @{inheritdoc} */
    protected $formTypeClassName = 'Tenolo\TranslationBundle\Form\Type\TokenType';

    /** @{inheritdoc} */
    protected $icon = "flag";

    /** @{inheritdoc} */
    protected $listSearchableParams = array('name');

    /** @{inheritdoc} */
    protected $wording = array(
        'article' => array(
            'singular' => 'translation.token.article.singular',
            'plural' => 'translation.token.article.plural',
        ),
        'object' => array(
            'singular' => 'translation.token.object.singular',
            'plural' => 'translation.token.object.plural',
        )
    );
} 