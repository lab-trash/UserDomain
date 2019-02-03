<?php
declare(strict_types=1);

namespace BSP\Tests\Entity;

use BSP\Entity\Token;
use BSP\Factory\TokenFactory;
use BSP\Factory\UserFactory;
use BSP\Types\Identity;
use BSP\ValueObject\TokenId;
use BSP\ValueObject\TokenValue;
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
