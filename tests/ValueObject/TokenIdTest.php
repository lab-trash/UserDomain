<?php
declare(strict_types=1);

namespace BSP\Tests\ValueObject;

use BSP\Types\Identity;
use BSP\ValueObject\TokenId;
use PHPUnit\Framework\TestCase;

final class TokenIdTest extends TestCase
{
    public function test_it_can_be_initialized(): void
    {
        $userId = new TokenId(Identity::generate());

        $this->assertSame(36, strlen($userId()));
    }
}
