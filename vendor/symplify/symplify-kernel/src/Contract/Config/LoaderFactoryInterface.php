<?php

declare (strict_types=1);
namespace MonorepoBuilder202208\Symplify\SymplifyKernel\Contract\Config;

use MonorepoBuilder202208\Symfony\Component\Config\Loader\LoaderInterface;
use MonorepoBuilder202208\Symfony\Component\DependencyInjection\ContainerBuilder;
interface LoaderFactoryInterface
{
    public function create(ContainerBuilder $containerBuilder, string $currentWorkingDirectory) : LoaderInterface;
}
