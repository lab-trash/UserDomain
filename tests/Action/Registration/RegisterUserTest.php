<?php
declare(strict_types=1);

namespace BSP\UserDomain\Tests\Action\Registration;

use BSP\UserDomain\Action\Registration\RegisterUser;
use BSP\UserDomain\ValueObject\Email;
use BSP\UserDomain\ValueObject\PlainPassword;
use PHPUnit\Framework\TestCase;

final class RegisterUserTest extends TestCase
{
    public function test_it_can_be_initialized(): void
    {
        $registerUser = new RegisterUser('john.snow@winterfell.com', 'winterIsComing');

        $this->assertInstanceOf(Email::class, $registerUser->email());
        $this->assertInstanceOf(PlainPassword::class, $registerUser->plainPassword());
    }
}
