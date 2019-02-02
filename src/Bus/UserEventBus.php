<?php
declare(strict_types=1);

namespace BSP\Bus;

use BSP\Action\Registration\UserRegistered;
use BSP\EventBus\EventBus;
use BSP\Port\IDispatchEvent;

final class UserEventBus extends EventBus
{
    public function __construct(IDispatchEvent $IDispatchEvent)
    {
        $this->listeners[UserRegistered::class] = [$IDispatchEvent];
    }
}
