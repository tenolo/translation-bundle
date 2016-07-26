<?php

namespace Tenolo\Bundle\TranslationBundle\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Tenolo\Bundle\AdminControlPanelBundle\Controller\BaseController;
use Tenolo\Bundle\CoreBundle\Controller\REST\EditAction;
use Tenolo\Bundle\CoreBundle\Controller\REST\RemoveAction;
use Tenolo\Bundle\CoreBundle\Controller\REST\MarkAction;

/**
 * Class DomainController
 * @package Tenolo\Bundle\TranslationBundle\Controller
 * @author Nikita Loges
 *
 * @Route("/translation/domain", name="acp.translation.domain")
 */
class DomainController extends BaseController
{

    use EditAction;
    use RemoveAction;
    use MarkAction;

    /** @{inheritdoc} */
    protected $entityName = "TenoloTranslationBundle:Domain";

    /** @{inheritdoc} */
    protected $formTypeClassName = 'Tenolo\Bundle\TranslationBundle\Form\Type\DomainType';

    /** @{inheritdoc} */
    protected $icon = "flag";

    /**
     * @{inheritdoc}
     */
    protected function getWording()
    {
        return array(
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
} 