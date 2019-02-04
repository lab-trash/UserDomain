<?php
declare(strict_types=1);

namespace BSP\Port;

use BSP\Entity\Token;
use BSP\ValueObject\TokenValue;

interface IReadToken
{
    public function getByTokenValue(TokenValue $tokenValue): Token;
}
