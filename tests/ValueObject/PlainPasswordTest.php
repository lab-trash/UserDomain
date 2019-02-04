<?php
declare(strict_types=1);

namespace BSP\UserDomain\Tests\ValueObject;

use BSP\Types\String\BasicString;
use BSP\UserDomain\ValueObject\PlainPassword;
use PHPUnit\Framework\TestCase;

final class PlainPasswordTest extends TestCase
{
    public function test_it_can_be_initialized(): void
    {
        $email = new PlainPassword(new BasicString('john.snow@winterfell.com'));

        $this->assertSame('john.snow@winterfell.com', $email());
    }
}
