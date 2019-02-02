<?php
declare(strict_types=1);

namespace BSP\Tests\Action\Registration;

use BSP\Action\Registration\RegisterUser;
use BSP\ValueObject\Email;
use BSP\ValueObject\PlainPassword;
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
