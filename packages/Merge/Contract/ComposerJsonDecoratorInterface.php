<?php

declare (strict_types=1);
namespace Symplify\MonorepoBuilder\Merge\Contract;

use MonorepoBuilder20211123\Symplify\ComposerJsonManipulator\ValueObject\ComposerJson;
interface ComposerJsonDecoratorInterface
{
    /**
     * @param \Symplify\ComposerJsonManipulator\ValueObject\ComposerJson $composerJson
     */
    public function decorate($composerJson) : void;
}
