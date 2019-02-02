<?php
declare(strict_types=1);

namespace BSP\Port;

use BSP\Entity\User;
use BSP\ValueObject\Email;
use BSP\ValueObject\UserId;

interface IReadUser
{
    public function isEmailAvailable(Email $email): bool;

    public function getByUserId(UserId $userId): User;

    public function getByEmail(Email $email): User;
}
