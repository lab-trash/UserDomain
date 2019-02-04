<?php
declare(strict_types=1);

namespace BSP\UserDomain\Port;

use BSP\UserDomain\Entity\User;

interface IWriteUser
{
    public function add(User $user): void;
}
