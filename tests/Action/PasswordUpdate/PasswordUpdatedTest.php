<?php
declare(strict_types=1);

namespace BSP\UserDomain\Tests\Action\PasswordUpdate;

use BSP\UserDomain\Action\PasswordUpdate\PasswordUpdated;
use BSP\UserDomain\Entity\User;
use BSP\UserDomain\Factory\UserFactory;
use PHPUnit\Framework\TestCase;

final class PasswordUpdatedTest extends TestCase
{
    public function test_it_can_be_initialized(): void
    {
        $user = new User(
            UserFactory::generateUserId(),
            UserFactory::email('john.snow@winterfell.com'),
            UserFactory::encodedPasswordFromHash('hash')
        );

        $event = new PasswordUpdated($user);

        $this->assertInstanceOf(User::class, $event->user());
    }
}
