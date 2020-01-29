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

use PHPUnit\Framework\TestCase;
use Naucon\Bundle\FormBundle\NauconFormBundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Naucon\Bundle\FormBundle\DependencyInjection\Compiler\FormCompilerPass;

class NauconFormBundleTest extends TestCase
{
    public function testBuild()
    {
        $containerMock = $this->createMock(ContainerBuilder::class);
        $containerMock
            ->expects($this->once())
            ->method('addCompilerPass')
            ->with($this->isInstanceOf(FormCompilerPass::class))
        ;

        $bundle = new NauconFormBundle();
        $bundle->build($containerMock);
    }
}
