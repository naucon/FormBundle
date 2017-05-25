<?php
/*
 * Copyright 2008 Sven Sanzenbacher
 *
 * This file is part of the naucon package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Naucon\Bundle\FormBundle\Tests;

use Naucon\Bundle\FormBundle\NauconFormBundle;

class NauconFormBundleTest extends \PHPUnit_Framework_TestCase
{
    public function testBuild()
    {
        new \Symfony\Component\DependencyInjection\ContainerBuilder();

        $containerMock = $this->getMock('Symfony\Component\DependencyInjection\ContainerBuilder');
        $containerMock->expects($this->exactly(1))
            ->method('addCompilerPass')
        ;

        $bundle = new NauconFormBundle();
        $bundle->build($containerMock);
    }
}