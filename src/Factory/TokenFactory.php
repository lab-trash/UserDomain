<?php
declare(strict_types=1);

namespace BSP\Factory;

use BSP\Entity\Token;
use BSP\TokenGenerator\TokenGenerator;
use BSP\Types\Identity;
use BSP\Types\String\BasicString;
use BSP\ValueObject\TokenId;
use BSP\ValueObject\UserId;
use BSP\ValueObject\TokenValue;

final class TokenFactory
{
    public static function generateForUser(UserId $userId): Token
    {
        $bspToken = TokenGenerator::generate();
        $id = new TokenId($userId);
        $tokenValue = static::tokenValue($bspToken->value());

        return new Token($id, $tokenValue, $bspToken->generatedAt(), $bspToken->expireAt());
    }

    public static function tokenId(Identity $identity): TokenId
    {
        return new TokenId($identity);
    }

    public static function tokenValue(string $tokenValue): TokenValue
    {
        return new TokenValue(new BasicString($tokenValue));
    }
}
