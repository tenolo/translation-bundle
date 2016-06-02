<?php

namespace Tenolo\Bundle\TranslationBundle;

use Mmoreram\SymfonyBundleDependencies\DependentBundleInterface;
use Shapecode\Bundle\RasSBundle\ShapecodeRasSBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\HttpKernel\KernelInterface;
use Tenolo\Bundle\AdminControlPanelBundle\TenoloAdminControlPanelBundle;
use Tenolo\Bundle\CoreBundle\TenoloCoreBundle;
use Tenolo\Bundle\CRUDAdminBundle\TenoloCRUDAdminBundle;
use Tenolo\Bundle\DoctrineTablePrefixBundle\TenoloDoctrineTablePrefixBundle;
use Tenolo\Bundle\MenuBundle\TenoloMenuBundle;

/**
 * Class TenoloTranslationBundle
 * @package Tenolo\Bundle\TranslationBundle
 * @author Nikita Loges
 * @company tenolo GbR
 */
class TenoloTranslationBundle extends Bundle implements DependentBundleInterface
{

    /**
     * @inheritdoc
     */
    public static function getBundleDependencies(KernelInterface $kernel)
    {
        return [
            FrameworkBundle::class,
            TwigBundle::class,
            ShapecodeRasSBundle::class,
            TenoloCoreBundle::class,
            TenoloMenuBundle::class,
            TenoloCRUDAdminBundle::class,
            TenoloAdminControlPanelBundle::class,
            TenoloDoctrineTablePrefixBundle::class,
        ];
    }
}
