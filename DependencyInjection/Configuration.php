<?php

namespace Fabz29\BreadcrumbBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('fabz29_breadcrumb');

        $rootNode->

            children()->
                scalarNode("template")->defaultValue("Fabz29BreadcrumbBundle::Breadcrumb:render.html.twig")->end()->
                scalarNode("home_route_name")->defaultValue("Accueil")->end()->
                scalarNode("home_route")->defaultValue("homepage")->end()->
                arrayNode("home_route_params")->prototype('scalar')->end()->
            end();

        return $treeBuilder;
    }
}
