<?php
declare(strict_types=1);

namespace BSP\UserDomain\Port;

use BSP\UserDomain\Entity\User;
use BSP\UserDomain\ValueObject\Email;
use BSP\UserDomain\ValueObject\UserId;

interface IReadUser
{
    public function isEmailAvailable(Email $email): bool;

    /** @throws \Exception */
    public function getByUserId(UserId $userId): User;

    /** @throws \Exception */
    public function getByEmail(Email $email): User;
}
