naucon Form Bundle
==================

About
-----
Bundle to integrate naucon form package into the Symfony2 framework.


### Compatibility

* PHP5.5.9


Installation
============

Step 1: Download the Bundle
---------------------------

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```console
    composer require naucon/form-bundle
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.


Step 2: Enable the Bundle
-------------------------

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:

```php
    <?php
    // app/AppKernel.php

    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Naucon\Bundle\FormBundle\NauconFormBundle(),
        );
    }
```

Configuration
-------------

```yml
    naucon_form:
        csrf_parameter: "_csrf_token"
        csrf_protection: true
```

Get Started
-----------

```php
    class DefaultController extends Controller
    {
        public function newAction(Request $request)
        {
            $user = new User();

            $formFactory = $this->get('naucon_form.factory');

            $form = $formFactory->createForm($user, 'user');
            if ($form->isBound()
                && $form->isValid()) {
                // some action, like saving the data to database

                // redirect to success page
            }

            return $this->render('default/new.html.twig', array(
                'form' => $form
            ));
        }
    }
```

Roadmap
-------

* Smarty Extensions integration
* add naucon validator to translations
