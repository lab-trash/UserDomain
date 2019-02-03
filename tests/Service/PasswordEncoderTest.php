<?php
declare(strict_types=1);

namespace BSP\Tests\Service;

use BSP\Factory\UserFactory;
use BSP\Service\PasswordEncoder;
use PHPUnit\Framework\TestCase;

final class PasswordEncoderTest extends TestCase
{
    public function test_it_can_hash_and_verify_password(): void
    {
        $password = UserFactory::plainPassword('winterIsComing');

        $hash = PasswordEncoder::hash($password);

        $this->assertTrue(PasswordEncoder::verify($password, $hash));
    }
}
