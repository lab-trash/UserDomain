<?php
declare(strict_types=1);

namespace BSP\UserDomain\Action\Registration;

use BSP\UserDomain\Entity\User;
use BSP\EventBus\Event;

final class UserRegistered implements Event
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function user(): User
    {
        return $this->user;
    }
}
