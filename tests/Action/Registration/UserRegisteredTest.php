<?php
declare(strict_types=1);

namespace BSP\UserDomain\Tests\Action\Registration;

use BSP\UserDomain\Action\Registration\UserRegistered;
use BSP\UserDomain\Entity\User;
use BSP\UserDomain\Factory\UserFactory;
use PHPUnit\Framework\TestCase;

final class UserRegisteredTest extends TestCase
{
    public function test_it_can_be_initialized(): void
    {
        $user = new User(
            UserFactory::generateUserId(),
            UserFactory::email('john.snow@email.com'),
            UserFactory::encodedPasswordFromHash('hashed-password')
        );

        $event = new UserRegistered($user);

        $this->assertSame($user, $event->user());
    }
}
