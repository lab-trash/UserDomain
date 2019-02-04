<?php
declare(strict_types=1);

namespace BSP\UserDomain\Port;

use BSP\UserDomain\Entity\Token;

interface IWriteToken
{
    public function add(Token $token): void;
}
