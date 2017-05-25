<?php
/*
 * Copyright 2008 Sven Sanzenbacher
 *
 * This file is part of the naucon package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Naucon\Bundle\FormBundle\Tests\DependencyInjection\Compiler;

use Naucon\Bundle\FormBundle\DependencyInjection\Compiler\FormCompilerPass;

class FormCompilerPassTest extends \PHPUnit_Framework_TestCase
{
    private $containerMock;
    private $definitionMock;

    public function setUp()
    {
        $this->containerMock = $this->getMock('Symfony\Component\DependencyInjection\ContainerBuilder');
        $this->definitionMock = $this->getMock('Symfony\Component\DependencyInjection\Definition');
    }

    public function testProcess()
    {
        $this->containerMock->expects($this->once())
            ->method('hasDefinition')
            ->with('translator.default')
            ->will($this->returnValue(true));

        $this->containerMock->expects($this->any())
            ->method('getDefinition')
            ->with('translator.default')
            ->will($this->returnValue($this->definitionMock));

        $compiler = new FormCompilerPass();
        $compiler->process($this->containerMock);
    }
}