<?php

declare (strict_types=1);
namespace MonorepoBuilder20211011\Symplify\SymplifyKernel\Strings;

use MonorepoBuilder20211011\Nette\Utils\Strings;
use MonorepoBuilder20211011\Symplify\SymplifyKernel\Exception\HttpKernel\TooGenericKernelClassException;
use MonorepoBuilder20211011\Symplify\SymplifyKernel\HttpKernel\AbstractSymplifyKernel;
final class KernelUniqueHasher
{
    /**
     * @var \Symplify\SymplifyKernel\Strings\StringsConverter
     */
    private $stringsConverter;
    public function __construct()
    {
        $this->stringsConverter = new \MonorepoBuilder20211011\Symplify\SymplifyKernel\Strings\StringsConverter();
    }
    public function hashKernelClass(string $kernelClass) : string
    {
        $this->ensureIsNotGenericKernelClass($kernelClass);
        $shortClassName = (string) \MonorepoBuilder20211011\Nette\Utils\Strings::after($kernelClass, '\\', -1);
        $userSpecificShortClassName = $shortClassName . \get_current_user();
        return $this->stringsConverter->camelCaseToGlue($userSpecificShortClassName, '_');
    }
    private function ensureIsNotGenericKernelClass(string $kernelClass) : void
    {
        if ($kernelClass !== \MonorepoBuilder20211011\Symplify\SymplifyKernel\HttpKernel\AbstractSymplifyKernel::class) {
            return;
        }
        $message = \sprintf('Instead of "%s", provide final Kernel class', \MonorepoBuilder20211011\Symplify\SymplifyKernel\HttpKernel\AbstractSymplifyKernel::class);
        throw new \MonorepoBuilder20211011\Symplify\SymplifyKernel\Exception\HttpKernel\TooGenericKernelClassException($message);
    }
}
