<?php
declare(strict_types=1);

namespace BSP\Port;

use BSP\Entity\Token;

interface IWriteToken
{
    public function add(Token $token): void;
}
