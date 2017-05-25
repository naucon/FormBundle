<?php
/*
 * Copyright 2008 Sven Sanzenbacher
 *
 * This file is part of the naucon package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Naucon\Bundle\FormBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Naucon\Bundle\FormBundle\DependencyInjection\Compiler\FormCompilerPass;

/**
 * Naucon Form Bundle
 *
 * @package    FormBundle
 * @author     Sven Sanzenbacher
 */
class NauconFormBundle extends Bundle
{
    /**
     * @param ContainerBuilder      $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new FormCompilerPass());
    }
}