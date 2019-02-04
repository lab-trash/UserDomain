<?php
declare(strict_types=1);

namespace BSP\UserDomain\Port;

use BSP\EventBus\Event;
use BSP\EventBus\EventListener;

interface IDispatchEvent extends EventListener
{
    public function dispatch(Event $event): void;
}
