<?php
declare(strict_types=1);

namespace BSP\Tests\Action\Registration;

use BSP\Action\Registration\UserRegistered;
use BSP\Entity\User;
use BSP\Service\PasswordEncoder;
use BSP\Types\Identity;
use BSP\Types\String\BasicString;
use BSP\ValueObject\Email;
use BSP\ValueObject\PlainPassword;
use BSP\ValueObject\UserId;
use PHPUnit\Framework\TestCase;

final class UserRegisteredTest extends TestCase
{
    public function test_it_can_be_initialized(): void
    {
        $user = new User(
            new UserId(Identity::generate()),
            new Email(new BasicString('john.snow@email.com')),
            PasswordEncoder::hash(new PlainPassword(new BasicString('winterIsComing')))
        );

        $event = new UserRegistered($user);

        $this->assertSame($user, $event->user());
    }
}
