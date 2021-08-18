<?php

declare (strict_types=1);
namespace MonorepoBuilder20210818\Symplify\PackageBuilder\Configuration;

final class StaticEolConfiguration
{
    public static function getEolChar() : string
    {
        return "\n";
    }
}
