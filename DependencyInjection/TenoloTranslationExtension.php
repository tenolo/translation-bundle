<?php

namespace Tenolo\Bundle\TranslationBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Class TenoloTranslationExtension
 * @package Tenolo\Bundle\TranslationBundle\DependencyInjection
 * @author Nikita Loges
 * @company tenolo GbR
 */
class TenoloTranslationExtension extends Extension implements PrependExtensionInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');
    }

    /**
     * {@inheritDoc}
     */
    public function prepend(ContainerBuilder $container)
    {
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('repository.yml');

        $doctrine['orm'] = array(
            'resolve_target_entities' => array(
                'Tenolo\Bundle\TranslationBundle\Entity\Plan\DomainInterface' => '%tenolo_translation.target_entity_resolver.domain.class%',
                'Tenolo\Bundle\TranslationBundle\Entity\Plan\LanguageInterface' => '%tenolo_translation.target_entity_resolver.language.class%',
                'Tenolo\Bundle\TranslationBundle\Entity\Plan\TokenInterface' => '%tenolo_translation.target_entity_resolver.token.class%',
                'Tenolo\Bundle\TranslationBundle\Entity\Plan\TranslationInterface' => '%tenolo_translation.target_entity_resolver.translation.class%',
            )
        );

        foreach ($container->getExtensions() as $name => $extension) {
            switch ($name) {
                case 'doctrine':
                    $container->prependExtensionConfig($name, $doctrine);
                    break;
            }
        }
    }
}
