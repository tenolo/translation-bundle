<?php

namespace Tenolo\Bundle\TranslationBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Tenolo\Bundle\TranslationBundle\Entity as BundleEntities;
use Tenolo\Bundle\TranslationBundle\Entity\Plan as BundleInterfaces;

/**
 * Class TenoloTranslationExtension
 *
 * @package Tenolo\Bundle\TranslationBundle\DependencyInjection
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class TenoloTranslationExtension extends Extension implements PrependExtensionInterface
{
    /**
     * @inheritdoc
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');
        $loader->load('form.yml');
    }

    /**
     * @inheritdoc
     */
    public function prepend(ContainerBuilder $container)
    {
        $container->prependExtensionConfig('doctrine', $this->getDoctrineConfig());
    }

    protected function getDoctrineConfig()
    {
        return [
            'orm' => [
                'resolve_target_entities' => [
                    BundleInterfaces\DomainInterface::class      => BundleEntities\Domain::class,
                    BundleInterfaces\LanguageInterface::class    => BundleEntities\Language::class,
                    BundleInterfaces\TokenInterface::class       => BundleEntities\Token::class,
                    BundleInterfaces\TranslationInterface::class => BundleEntities\Translation::class,
                ]
            ]
        ];
    }
}
