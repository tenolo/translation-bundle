<?php

namespace Tenolo\Bundle\TranslationBundle\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Tenolo\Bundle\AdminControlPanelBundle\Controller\BaseController;
use Tenolo\Bundle\CoreBundle\Controller\REST\EditAction;
use Tenolo\Bundle\CoreBundle\Controller\REST\RemoveAction;
use Tenolo\Bundle\CoreBundle\Controller\REST\MarkAction;
use Tenolo\Bundle\TranslationBundle\Entity\Token;
use Tenolo\Bundle\TranslationBundle\Form\Type\TokenType;

/**
 * Class TokenController
 * @package Tenolo\Bundle\TranslationBundle\Controller
 * @author Nikita Loges
 *
 * @Route("/translation/token", name="acp.translation.token")
 */
class TokenController extends BaseController
{

    use EditAction;
    use RemoveAction;
    use MarkAction;

    /** @{inheritdoc} */
    protected $entityName = Token::class;

    /** @{inheritdoc} */
    protected $formTypeClassName = TokenType::class;

    /** @{inheritdoc} */
    protected $icon = "flag";

    /**
     * @{inheritdoc}
     */
    protected function getWording()
    {
        return array(
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
} 