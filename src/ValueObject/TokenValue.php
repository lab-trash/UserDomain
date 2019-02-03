<?php
declare(strict_types=1);

namespace BSP\ValueObject;

use BSP\Types\Contracts\IString;

final class TokenValue implements IString
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
