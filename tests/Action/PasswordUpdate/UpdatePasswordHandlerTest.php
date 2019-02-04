<?php
declare(strict_types=1);

namespace BSP\UserDomain\Tests\Action\PasswordUpdate;

use BSP\UserDomain\Action\PasswordUpdate\UpdatePassword;
use BSP\UserDomain\Action\PasswordUpdate\UpdatePasswordHandler;
use BSP\UserDomain\Bus\UserEventBus;
use BSP\UserDomain\Entity\Token;
use BSP\UserDomain\Entity\User;
use BSP\UserDomain\Factory\TokenFactory;
use BSP\UserDomain\Factory\UserFactory;
use BSP\UserDomain\Port\IDispatchEvent;
use BSP\UserDomain\Port\IReadToken;
use BSP\UserDomain\Port\IReadUser;
use BSP\UserDomain\Port\IWriteUser;
use BSP\Types\Identity;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

final class UpdatePasswordHandlerTest extends TestCase
{
    public function test_it_can_handle_command(): void
    {
        /** @var IReadToken|MockObject $iReadToken */
        $iReadToken = $this->createMock(IReadToken::class);
        /** @var IReadUser|MockObject $iReadUser */
        $iReadUser = $this->createMock(IReadUser::class);
        /** @var IWriteUser|MockObject $iWriteUser */
        $iWriteUser = $this->createMock(IWriteUser::class);
        /** @var IDispatchEvent|MockObject $iDispatchEvent */
        $iDispatchEvent = $this->createMock(IDispatchEvent::class);
        $eventBus = new UserEventBus($iDispatchEvent);

        $user = new User(
            UserFactory::generateUserId(),
            UserFactory::email('john.snow@winterfell.com'),
            UserFactory::encodedPasswordFromHash('hashed-password')
        );

        $iReadToken
            ->expects($this->once())
            ->method('getByTokenValue')
            ->willReturn(TokenFactory::generateForUser($user->id()));

        $iReadUser
            ->expects($this->once())
            ->method('getByUserId')
            ->willReturn($user);

        $iWriteUser
            ->expects($this->once())
            ->method('add');

        $command = new UpdatePassword('fake-token', 'nightsWatch');
        $handler = new UpdatePasswordHandler($iReadToken, $iReadUser, $iWriteUser, $eventBus);

        $handler->handle($command);
    }

    public function test_it_cannot_handle_command_if_token_is_expired(): void
    {
        /** @var IReadToken|MockObject $iReadToken */
        $iReadToken = $this->createMock(IReadToken::class);
        /** @var IReadUser|MockObject $iReadUser */
        $iReadUser = $this->createMock(IReadUser::class);
        /** @var IWriteUser|MockObject $iWriteUser */
        $iWriteUser = $this->createMock(IWriteUser::class);
        /** @var IDispatchEvent|MockObject $iDispatchEvent */
        $iDispatchEvent = $this->createMock(IDispatchEvent::class);
        $eventBus = new UserEventBus($iDispatchEvent);

        $user = new User(
            UserFactory::generateUserId(),
            UserFactory::email('john.snow@winterfell.com'),
            UserFactory::encodedPasswordFromHash('hashed-password')
        );

        $token = new Token(
            TokenFactory::tokenId(Identity::generate()),
            TokenFactory::tokenValue('token-value'),
            new \DateTimeImmutable(),
            new \DateTimeImmutable()
        );

        $iReadToken
            ->expects($this->once())
            ->method('getByTokenValue')
            ->willReturn($token);

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('password_token.expired');

        $command = new UpdatePassword('fake-token', 'nightsWatch');
        $handler = new UpdatePasswordHandler($iReadToken, $iReadUser, $iWriteUser, $eventBus);

        $handler->handle($command);
    }
}
