<?php

declare(strict_types=1);

namespace Kiboko\Component\Satellite\Plugin\Custom\Configuration;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;


final class Extractor implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {

        $builder = new TreeBuilder('extractor');

        /** @phpstan-ignore-next-line */
        $builder->getRootNode()
            ->children()
                ->arrayNode('services')
                    ->useAttributeAsKey('class')
                    ->arrayPrototype()
                        ->children()
                            ->scalarNode('class')->end()
                            ->arrayNode('arguments')
                                ->useAttributeAsKey('key')
                                ->scalarPrototype()
                                ->end()
                             ->end()
                        ->end()
                    ->end()
                ->end()
                ->scalarNode('use')->end()
                ->arrayNode('parameters')
                    ->useAttributeAsKey('keyparam')
                    ->scalarPrototype()
                    ->end()
                ->end()
            ->end();

        return $builder;
    }



}
