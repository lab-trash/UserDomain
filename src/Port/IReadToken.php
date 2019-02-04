<?php
declare(strict_types=1);

namespace BSP\UserDomain\Port;

use BSP\UserDomain\Entity\Token;
use BSP\UserDomain\ValueObject\TokenValue;

interface IReadToken
{
    public function getByTokenValue(TokenValue $tokenValue): Token;
}
