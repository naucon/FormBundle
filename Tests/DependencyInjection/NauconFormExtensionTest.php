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

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Naucon\Bundle\FormBundle\DependencyInjection\NauconFormExtension;

class NauconFormExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider configProvider
     */
    public function testLoad(array $config)
    {
        $container = new ContainerBuilder();
        $loader = new NauconFormExtension();
        $loader->load(array($config), $container);

        $this->assertEquals($config, $container->getParameter('naucon_form.options'));

// not working because symfony services are not present
//        $this->assertInstanceOf('Naucon\Form\Translator\TranslatorInterface', $container->get('naucon_form.translator'));
//        $this->assertInstanceOf('Naucon\Form\Validator\ValidatorInterface', $container->get('naucon_form.validator'));
//        $this->assertInstanceOf('Naucon\Form\Security\SynchronizerTokenInterface', $container->get('naucon_form.synchronizer_token'));
//        $this->assertInstanceOf('Naucon\Form\FormManager', $container->get('naucon_form.factory'));
    }

    public function configProvider()
    {
        return array(
            array(
                array('csrf_parameter' => '_csrf_token', 'csrf_protection' => true),
                array('csrf_parameter' => '_csrf_token', 'csrf_protection' => false),
                array('csrf_parameter' => '_foo_token', 'csrf_protection' => true)
            )
        );
    }
}