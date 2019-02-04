<?php
declare(strict_types=1);

namespace BSP\UserDomain\Tests\Action\ForgottenPasswordDeclaration;

use BSP\UserDomain\Action\ForgottenPasswordDeclaration\DeclareForgottenPassword;
use BSP\UserDomain\Action\ForgottenPasswordDeclaration\DeclareForgottenPasswordHandler;
use BSP\UserDomain\Bus\UserEventBus;
use BSP\UserDomain\Entity\User;
use BSP\UserDomain\Factory\UserFactory;
use BSP\UserDomain\Port\IDispatchEvent;
use BSP\UserDomain\Port\IReadUser;
use BSP\UserDomain\Port\IWriteToken;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

final class DeclareForgottenPasswordHandlerTest extends TestCase
{
    public function test_it_can_handle_command(): void
    {
        /** @var IReadUser|MockObject $iReadUser */
        $iReadUser = $this->createMock(IReadUser::class);
        /** @var IWriteToken|MockObject $iWriteToken */
        $iWriteToken = $this->createMock(IWriteToken::class);

        $iDispatchEvent = $this->createMock(IDispatchEvent::class);

        $handler = new DeclareForgottenPasswordHandler($iReadUser, $iWriteToken, new UserEventBus($iDispatchEvent));

        $command = new DeclareForgottenPassword('john.snow@winterfell.com');

        $iReadUser->method('getByEmail')->willReturn(new User(
            UserFactory::generateUserId(),
            UserFactory::email('john.snow@winterfell.com'),
            UserFactory::encodedPasswordFromHash('hashed-password')
        ));

        $iWriteToken
            ->expects($this->once())
            ->method('add');

        $handler->handle($command);
    }
}
