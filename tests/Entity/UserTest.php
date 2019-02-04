<?php
declare(strict_types=1);

namespace BSP\UserDomain\Tests\Entity;

use BSP\UserDomain\Entity\User;
use BSP\UserDomain\Factory\UserFactory;
use BSP\UserDomain\ValueObject\Email;
use BSP\UserDomain\ValueObject\EncodedPassword;
use BSP\UserDomain\ValueObject\UserId;
use PHPUnit\Framework\TestCase;

final class UserTest extends TestCase
{
    public function test_it_can_be_initialized(): void
    {
        $user = new User(
            UserFactory::generateUserId(),
            UserFactory::email('john.snow@winterfell.com'),
            UserFactory::encodedPasswordFromHash('hash')
        );

        $this->assertInstanceOf(UserId::class, $user->id());
        $this->assertInstanceOf(Email::class, $user->email());
        $this->assertInstanceOf(EncodedPassword::class, $user->password());
    }
}
