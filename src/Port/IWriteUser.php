<?php
declare(strict_types=1);

namespace BSP\Port;

use BSP\Entity\User;

interface IWriteUser
{
    public function add(User $user): void;
}
