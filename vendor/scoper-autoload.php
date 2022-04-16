<?php

// scoper-autoload.php @generated by PhpScoper

$loader = require_once __DIR__.'/autoload.php';

// Aliases for the whitelisted classes. For more information see:
// https://github.com/humbug/php-scoper/blob/master/README.md#class-whitelisting
if (!class_exists('ComposerAutoloaderInite1b9c243c463302dee13b23aaf840990', false) && !interface_exists('ComposerAutoloaderInite1b9c243c463302dee13b23aaf840990', false) && !trait_exists('ComposerAutoloaderInite1b9c243c463302dee13b23aaf840990', false)) {
    spl_autoload_call('MonorepoBuilder20220416\ComposerAutoloaderInite1b9c243c463302dee13b23aaf840990');
}
if (!class_exists('Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator', false) && !interface_exists('Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator', false) && !trait_exists('Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator', false)) {
    spl_autoload_call('MonorepoBuilder20220416\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator');
}
if (!class_exists('Normalizer', false) && !interface_exists('Normalizer', false) && !trait_exists('Normalizer', false)) {
    spl_autoload_call('MonorepoBuilder20220416\Normalizer');
}
if (!class_exists('ReturnTypeWillChange', false) && !interface_exists('ReturnTypeWillChange', false) && !trait_exists('ReturnTypeWillChange', false)) {
    spl_autoload_call('MonorepoBuilder20220416\ReturnTypeWillChange');
}
if (!class_exists('Symplify\ComposerJsonManipulator\ValueObject\ComposerJsonSection', false) && !interface_exists('Symplify\ComposerJsonManipulator\ValueObject\ComposerJsonSection', false) && !trait_exists('Symplify\ComposerJsonManipulator\ValueObject\ComposerJsonSection', false)) {
    spl_autoload_call('MonorepoBuilder20220416\Symplify\ComposerJsonManipulator\ValueObject\ComposerJsonSection');
}

// Functions whitelisting. For more information see:
// https://github.com/humbug/php-scoper/blob/master/README.md#functions-whitelisting
if (!function_exists('resolveConfigFile')) {
    function resolveConfigFile() {
        return \MonorepoBuilder20220416\resolveConfigFile(...func_get_args());
    }
}
if (!function_exists('composerRequiree1b9c243c463302dee13b23aaf840990')) {
    function composerRequiree1b9c243c463302dee13b23aaf840990() {
        return \MonorepoBuilder20220416\composerRequiree1b9c243c463302dee13b23aaf840990(...func_get_args());
    }
}
if (!function_exists('scanPath')) {
    function scanPath() {
        return \MonorepoBuilder20220416\scanPath(...func_get_args());
    }
}
if (!function_exists('lintFile')) {
    function lintFile() {
        return \MonorepoBuilder20220416\lintFile(...func_get_args());
    }
}
if (!function_exists('array_is_list')) {
    function array_is_list() {
        return \MonorepoBuilder20220416\array_is_list(...func_get_args());
    }
}
if (!function_exists('setproctitle')) {
    function setproctitle() {
        return \MonorepoBuilder20220416\setproctitle(...func_get_args());
    }
}
if (!function_exists('enum_exists')) {
    function enum_exists() {
        return \MonorepoBuilder20220416\enum_exists(...func_get_args());
    }
}

return $loader;
