<?php

namespace Tenolo\Bundle\TranslationBundle\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Tenolo\Bundle\AdminControlPanelBundle\Controller\BaseController;
use Tenolo\Bundle\CoreBundle\Controller\REST\EditAction;
use Tenolo\Bundle\CoreBundle\Controller\REST\MarkAction;
use Tenolo\Bundle\CoreBundle\Controller\REST\RemoveAction;
use Tenolo\Bundle\TranslationBundle\Entity\Domain;
use Tenolo\Bundle\TranslationBundle\Form\Type\DomainType;

/**
 * Class DomainController
 *
 * @package Tenolo\Bundle\TranslationBundle\Controller
 * @author  Nikita Loges
 *
 * @Route("/translation/domain", name="acp.translation.domain")
 */
class DomainController extends BaseController
{

    use EditAction;
    use RemoveAction;
    use MarkAction;

    /** @{inheritdoc} */
    protected $entityName = Domain::class;

    /** @{inheritdoc} */
    protected $formTypeClassName = DomainType::class;

    /** @{inheritdoc} */
    protected $icon = "flag";

    /**
     * @{inheritdoc}
     */
    protected function getWording()
    {
        return [
            'article' => [
                'singular' => 'translation.domain.article.singular',
                'plural'   => 'translation.domain.article.plural',
            ],
            'object'  => [
                'singular' => 'translation.domain.object.singular',
                'plural'   => 'translation.domain.object.plural',
            ]
        ];
    }
} 