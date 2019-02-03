<?php
declare(strict_types=1);

namespace BSP\Tests\Action\Registration;

use BSP\Action\Registration\RegisterUser;
use BSP\Action\Registration\RegisterUserHandler;
use BSP\Port\IReadUser;
use BSP\Port\IWriteUser;
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

        $iReadUser->method('isEmailAvailable')->willReturn(true);

        $iReadUser
            ->expects($this->once())
            ->method('isEmailAvailable');

        $iWriteUser
            ->expects($this->once())
            ->method('add');

        $registerUserHandler = new RegisterUserHandler($iReadUser, $iWriteUser);

        $registerUser = new RegisterUser('john.snow@winterfell.com', 'winterIsComing');

        $registerUserHandler->handle($registerUser);
    }
}
