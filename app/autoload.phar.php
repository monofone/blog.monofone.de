<?php

Phar::interceptFileFuncs();
require_once __DIR__.'/../symfony.phar';

$loader->registerNamespaces(array(
    'Blage'            => __DIR__.'/../src',
    'Application'      => __DIR__.'/../src',
    'FOS'              => __DIR__.'/../vendor/bundles',
    'Sonata' => __DIR__.'/../vendor/bundles',
    'Knp'    => array(
        __DIR__.'/../vendor/bundles',
        __DIR__.'/../vendor/bundles/Knp/Bundle/menu/src',
    ),    
));


