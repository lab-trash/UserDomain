<?php
declare(strict_types=1);

namespace BSP\UserDomain\Bus;

use BSP\UserDomain\Action\ForgottenPasswordDeclaration\ForgottenPasswordDeclared;
use BSP\UserDomain\Action\PasswordUpdate\PasswordUpdated;
use BSP\UserDomain\Action\Registration\UserRegistered;
use BSP\EventBus\EventBus;
use BSP\UserDomain\Port\IDispatchEvent;

final class UserEventBus extends EventBus
{
    public function __construct(IDispatchEvent $IDispatchEvent)
    {
        $this->listeners[UserRegistered::class] = [$IDispatchEvent];
        $this->listeners[ForgottenPasswordDeclared::class] = [$IDispatchEvent];
        $this->listeners[PasswordUpdated::class] = [$IDispatchEvent];
    }
}
