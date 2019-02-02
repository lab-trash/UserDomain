<?php
declare(strict_types=1);

namespace BSP\Tests\Entity;

use BSP\Entity\User;
use BSP\Types\Identity;
use BSP\Types\String\BasicString;
use BSP\ValueObject\Email;
use BSP\ValueObject\EncodedPassword;
use BSP\ValueObject\UserId;
use PHPUnit\Framework\TestCase;

final class UserTest extends TestCase
{
    public function test_it_can_be_initialized(): void
    {
        $user = new User(
            new UserId(Identity::generate()),
            new Email(new BasicString('john.snow@winterfell.com')),
            new EncodedPassword(new BasicString('hash'))
        );

        $this->assertInstanceOf(UserId::class, $user->id());
        $this->assertInstanceOf(Email::class, $user->email());
        $this->assertInstanceOf(EncodedPassword::class, $user->password());
    }
}
