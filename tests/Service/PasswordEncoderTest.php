<?php
declare(strict_types=1);

namespace BSP\Tests\Service;

use BSP\Service\PasswordEncoder;
use BSP\Types\String\BasicString;
use BSP\ValueObject\PlainPassword;
use PHPUnit\Framework\TestCase;

final class PasswordEncoderTest extends TestCase
{
    public function test_it_can_hash_and_verify_password(): void
    {
        $password = new PlainPassword(new BasicString('winterIsComing'));

        $hash = PasswordEncoder::hash($password);

        $this->assertTrue(PasswordEncoder::verify($password, $hash));
    }
}
