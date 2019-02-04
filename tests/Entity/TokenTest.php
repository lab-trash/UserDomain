<?php
declare(strict_types=1);

namespace BSP\UserDomain\Tests\Entity;

use BSP\UserDomain\Entity\Token;
use BSP\UserDomain\Factory\TokenFactory;
use BSP\UserDomain\Factory\UserFactory;
use BSP\Types\Identity;
use BSP\UserDomain\ValueObject\TokenId;
use BSP\UserDomain\ValueObject\TokenValue;
use PHPUnit\Framework\TestCase;

final class TokenTest extends TestCase
{
    public function test_it_can_be_initialized(): void
    {
        $token = new Token(
            TokenFactory::tokenId(Identity::generate()),
            TokenFactory::tokenValue('fake-token'),
            new \DateTimeImmutable(),
            new \DateTimeImmutable()
        );

        $this->assertInstanceOf(TokenId::class, $token->id());
        $this->assertInstanceOf(TokenValue::class, $token->value());
        $this->assertInstanceOf(\DateTimeImmutable::class, $token->generatedAt());
        $this->assertInstanceOf(\DateTimeImmutable::class, $token->expireAt());
    }
}
