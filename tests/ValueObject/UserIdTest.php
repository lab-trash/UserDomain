<?php
declare(strict_types=1);

namespace BSP\UserDomain\Tests\ValueObject;

use BSP\Types\Identity;
use BSP\UserDomain\ValueObject\UserId;
use PHPUnit\Framework\TestCase;

final class UserIdTest extends TestCase
{
    public function test_it_can_be_initialized(): void
    {
        $userId = new UserId(Identity::generate());

        $this->assertSame(36, strlen($userId()));
    }
}
