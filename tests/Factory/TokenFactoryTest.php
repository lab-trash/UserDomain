<?php
declare(strict_types=1);

namespace BSP\Tests\Factory;

use BSP\Entity\Token;
use BSP\Entity\User;
use BSP\Factory\TokenFactory;
use BSP\Factory\UserFactory;
use BSP\Types\Identity;
use BSP\ValueObject\TokenId;
use BSP\ValueObject\TokenValue;
use PHPUnit\Framework\TestCase;

final class TokenFactoryTest extends TestCase
{
    public function test_it_can_generate_a_token_for_specified_user(): void
    {
        $user = new User(
            UserFactory::generateUserId(),
            UserFactory::email('john.snow@winterfell.com'),
            UserFactory::encodedPasswordFromHash('hashed-password')
        );

        $token = TokenFactory::generateForUser($user->id());

        $this->assertInstanceOf(Token::class, $token);
    }

    public function test_it_can_create_a_token_id_from_an_other_id(): void
    {
        $tokenId = TokenFactory::tokenId(Identity::generate());

        $this->assertInstanceOf(TokenId::class, $tokenId);
    }

    public function test_it_can_create_a_token_value_from_string_value(): void
    {
        $tokenValue = TokenFactory::tokenValue('fake-token');

        $this->assertInstanceOf(TokenValue::class, $tokenValue);
    }
}
