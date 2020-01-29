<?php
/*
 * Copyright 2008 Sven Sanzenbacher
 *
 * This file is part of the naucon package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Naucon\Bundle\FormBundle\Tests\DependencyInjection;

use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Naucon\Bundle\FormBundle\DependencyInjection\NauconFormExtension;

class NauconFormExtensionTest extends TestCase
{
    /**
     * @dataProvider configProvider
     */
    public function testLoad(array $config)
    {
        $container = new ContainerBuilder();
        $loader = new NauconFormExtension();
        $loader->load([$config], $container);

        $this->assertEquals($config, $container->getParameter('naucon_form.options'));
    }

    public function configProvider()
    {
        return [
            [
                ['csrf_parameter' => '_csrf_token', 'csrf_protection' => true],
                ['csrf_parameter' => '_csrf_token', 'csrf_protection' => false],
                ['csrf_parameter' => '_foo_token', 'csrf_protection' => true]
            ]
        ];
    }
}
