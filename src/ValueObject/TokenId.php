<?php
declare(strict_types=1);

namespace BSP\ValueObject;

use BSP\Types\Contracts\IUuid;

final class TokenId implements IUuid
{
    private $value;

    public function __construct(IUuid $uuid)
    {
        $this->value = $uuid();
    }

    public function __invoke(): string
    {
        return $this->value;
    }
}
