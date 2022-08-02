<?php

declare (strict_types=1);
namespace MonorepoBuilder202208\Symplify\EasyTesting\PHPUnit;

/**
 * @api
 */
final class StaticPHPUnitEnvironment
{
    /**
     * Never ever used static methods if not neccesary, this is just handy for tests + src to prevent duplication.
     */
    public static function isPHPUnitRun() : bool
    {
        return \defined('MonorepoBuilder202208\\PHPUNIT_COMPOSER_INSTALL') || \defined('MonorepoBuilder202208\\__PHPUNIT_PHAR__');
    }
}
