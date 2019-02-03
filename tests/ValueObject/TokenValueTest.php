<?php
declare(strict_types=1);

namespace BSP\Tests\ValueObject;

use BSP\Types\String\BasicString;
use BSP\ValueObject\TokenValue;
use PHPUnit\Framework\TestCase;

final class TokenValueTest extends TestCase
{
    public function test_it_can_be_initialized(): void
    {
        $tokenValue = new TokenValue(new BasicString('fake-token'));

        $this->assertSame('fake-token', $tokenValue());
    }
}
