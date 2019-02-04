<?php
declare(strict_types=1);

namespace BSP\UserDomain\Tests\ValueObject;

use BSP\Types\String\BasicString;
use BSP\UserDomain\ValueObject\EncodedPassword;
use PHPUnit\Framework\TestCase;

final class EncodedPasswordTest extends TestCase
{
    public function test_it_can_be_initialized(): void
    {
        $encodedPassword = new EncodedPassword(new BasicString('hash'));

        $this->assertSame('hash', $encodedPassword());
    }
}
