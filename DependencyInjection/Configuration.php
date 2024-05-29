<?php
/*
 * Copyright 2008 Sven Sanzenbacher
 *
 * This file is part of the naucon package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Naucon\Bundle\FormBundle\DependencyInjection;
 
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

/**
 * Configuration
 *
 * @package    FormBundle
 * @author     Sven Sanzenbacher
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('naucon_form');
        $rootNode = $treeBuilder->getRootNode();
        $rootNode->children()
            ->scalarNode('csrf_parameter')->defaultValue('_csrf_token')->end()
            ->booleanNode('csrf_protection')->defaultTrue()->end()
        ->end();

        return $treeBuilder;
    }
}
