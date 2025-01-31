<?php
declare(strict_types=1);

namespace BSP\UserDomain\ValueObject;

use BSP\Types\Contracts\IString;

final class PlainPassword implements IString
{
    private $value;

    public function __construct(IString $string)
    {
        $this->value = $string();
    }

    public function __invoke(): string
    {
        return $this->value;
    }
}
