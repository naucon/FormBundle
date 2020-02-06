<?php
/*
 * Copyright 2008 Sven Sanzenbacher
 *
 * This file is part of the naucon package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Naucon\Bundle\FormBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\Finder\Finder;
use Naucon\Form\FormManager;

/**
 * Form Compiler Pass
 *
 * @package    FormBundle
 * @author     Sven Sanzenbacher
 */
class FormCompilerPass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        if ($container->hasDefinition('translator.default')) {

            // add default translations from symfony validation component
            $dirs = array();
            if (class_exists('Naucon\Form\FormManager')) {
                $r = new \ReflectionClass(FormManager::class);
                $dir = dirname($r->getFileName()) . '/Resources/translations';
                if (is_dir($dir)) {
                    $dirs[] = $dir;
                }
            }

            $finder = Finder::create()
                ->files()
                ->filter(function (\SplFileInfo $file) {
                    return 2 === substr_count($file->getBasename(), '.') && preg_match('/\.\w+$/', $file->getBasename());
                })
                ->in($dirs)
            ;

            foreach ($finder as $file) {
                list($translationDomain, $locale, $extension) = $foo = explode('.', $file->getBasename(), 3);

                $container
                    ->getDefinition('translator.default')
                    ->addMethodCall('addResource', [$extension, $file->getPathname(), $locale, $translationDomain]);
            }

        }
    }
}
