<?php
declare(strict_types=1);

namespace BSP\Tests\Action\PasswordUpdate;

use BSP\Action\PasswordUpdate\UpdatePassword;
use BSP\ValueObject\PlainPassword;
use BSP\ValueObject\TokenValue;
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
