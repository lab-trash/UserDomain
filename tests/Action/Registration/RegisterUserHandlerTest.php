<?php
declare(strict_types=1);

namespace BSP\UserDomain\Tests\Action\Registration;

use BSP\UserDomain\Action\Registration\RegisterUser;
use BSP\UserDomain\Action\Registration\RegisterUserHandler;
use BSP\UserDomain\Bus\UserEventBus;
use BSP\UserDomain\Port\IDispatchEvent;
use BSP\UserDomain\Port\IReadUser;
use BSP\UserDomain\Port\IWriteUser;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

final class RegisterUserHandlerTest extends TestCase
{
    public function test_it_can_handle_register_user(): void
    {
        /** @var IReadUser|MockObject $iReadUser */
        $iReadUser = $this->createMock(IReadUser::class);
        /** @var IWriteUser|MockObject $iWriteUser */
        $iWriteUser = $this->createMock(IWriteUser::class);
        /** @var IDispatchEvent|MockObject $iDispatchEvent */
        $iDispatchEvent = $this->createMock(IDispatchEvent::class);

        $iReadUser->method('isEmailAvailable')->willReturn(true);

        $iReadUser
            ->expects($this->once())
            ->method('isEmailAvailable');

        $iWriteUser
            ->expects($this->once())
            ->method('add');

        $registerUserHandler = new RegisterUserHandler($iReadUser, $iWriteUser, new UserEventBus($iDispatchEvent));

        $registerUser = new RegisterUser('john.snow@winterfell.com', 'winterIsComing');

        $registerUserHandler->handle($registerUser);
    }
}
