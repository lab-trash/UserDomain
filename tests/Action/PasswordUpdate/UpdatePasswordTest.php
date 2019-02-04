<?php
declare(strict_types=1);

namespace BSP\UserDomain\Tests\Action\PasswordUpdate;

use BSP\UserDomain\Action\PasswordUpdate\UpdatePassword;
use BSP\UserDomain\ValueObject\PlainPassword;
use BSP\UserDomain\ValueObject\TokenValue;
use PHPUnit\Framework\TestCase;

final class UpdatePasswordTest extends TestCase
{
    public function test_it_can_be_initialized(): void
    {
        $command = new UpdatePassword('fake-token', 'winterIsComing');

        $this->assertInstanceOf(TokenValue::class, $command->tokenValue());
        $this->assertInstanceOf(PlainPassword::class, $command->plainPassword());
    }
}
