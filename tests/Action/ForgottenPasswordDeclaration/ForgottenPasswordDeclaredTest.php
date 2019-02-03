<?php
declare(strict_types=1);

namespace BSP\Tests\Action\ForgottenPasswordDeclaration;

use BSP\Action\ForgottenPasswordDeclaration\ForgottenPasswordDeclared;
use BSP\Entity\User;
use BSP\Factory\TokenFactory;
use BSP\Factory\UserFactory;
use PHPUnit\Framework\TestCase;

final class ForgottenPasswordDeclaredTest extends TestCase
{
    public function test_it_can_be_initialized(): void
    {
        $user = new User(
            UserFactory::generateUserId(),
            UserFactory::email('john.snow@winterfell.com'),
            UserFactory::encodedPasswordFromHash('hash')
        );

        $token = TokenFactory::generateForUser($user->id());

        $event = new ForgottenPasswordDeclared($user, $token);

        $this->assertSame($user, $event->user());
        $this->assertSame($token, $event->token());
    }
}
