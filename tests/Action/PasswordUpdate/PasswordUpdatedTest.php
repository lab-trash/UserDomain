<?php
declare(strict_types=1);

namespace BSP\Tests\Action\PasswordUpdate;

use BSP\Action\PasswordUpdate\PasswordUpdated;
use BSP\Entity\User;
use BSP\Factory\UserFactory;
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
