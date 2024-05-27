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

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Naucon\Bundle\FormBundle\DependencyInjection\Compiler\FormCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

class FormCompilerPassTest extends TestCase
{
    /**
     * @var ContainerBuilder|MockObject
     */
    private $containerMock;

    /**
     * @var Definition|MockObject
     */
    private $definitionMock;

    public function setUp(): void
    {
        $this->containerMock = $this->createMock(ContainerBuilder::class);
        $this->definitionMock = $this->createMock(Definition::class);
    }

    public function testProcess()
    {
        $this->containerMock
            ->expects($this->once())
            ->method('hasDefinition')
            ->with('translator.default')
            ->willReturn(true);

        $this->containerMock
            ->expects($this->any())
            ->method('getDefinition')
            ->with('translator.default')
            ->willReturn($this->definitionMock);

        $compiler = new FormCompilerPass();
        $compiler->process($this->containerMock);
    }
}
