<?php

namespace Tenolo\TranslationBundle\Controller;

use Tenolo\AdminBundle\Controller\BaseController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DomainController
 * @package Tenolo\TranslationBundle\Controller
 * @author Nikita Loges
 *
 * @Route("/translation/domain", name="acp.translation.domain")
 */
class DomainController extends BaseController
{

    /** @{inheritdoc} */
    protected $entityRepository = "TenoloTranslationBundle:Domain";

    /** @{inheritdoc} */
    protected $formType = 'Tenolo\TranslationBundle\Form\Type\DomainType';

    /** @{inheritdoc} */
    protected $icon = "flag";

    /** @{inheritdoc} */
    protected $listSearchableParams = array('name');

    /** @{inheritdoc} */
    protected $wording = array(
        'article' => array(
            'singular' => 'translation.domain.article.singular',
            'plural' => 'translation.domain.article.plural',
        ),
        'object' => array(
            'singular' => 'translation.domain.object.singular',
            'plural' => 'translation.domain.object.plural',
        )
    );
} 