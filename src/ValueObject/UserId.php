<?php
declare(strict_types=1);

namespace BSP\UserDomain\ValueObject;

use BSP\Types\Contracts\IUuid;

final class UserId implements IUuid
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
