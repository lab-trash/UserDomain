<?php
declare(strict_types=1);

namespace BSP\Tests\Action\ForgottenPasswordDeclaration;

use BSP\Action\ForgottenPasswordDeclaration\DeclareForgottenPassword;
use BSP\Action\ForgottenPasswordDeclaration\DeclareForgottenPasswordHandler;
use BSP\Bus\UserEventBus;
use BSP\Entity\User;
use BSP\Factory\UserFactory;
use BSP\Port\IDispatchEvent;
use BSP\Port\IReadUser;
use BSP\Port\IWriteToken;
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
