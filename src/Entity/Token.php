<?php
declare(strict_types=1);

namespace BSP\Entity;

use BSP\ValueObject\TokenId;
use BSP\ValueObject\TokenValue;

final class Token
{
    private $id;
    private $value;
    private $generatedAt;
    private $expireAt;

    public function __construct(
        TokenId $tokenId,
        TokenValue $tokenValue,
        \DateTimeImmutable $generatedAt,
        \DateTimeImmutable $expireAt
    ) {
        $this->id = $tokenId;
        $this->value = $tokenValue;
        $this->generatedAt = $generatedAt;
        $this->expireAt = $expireAt;
    }

    public function id(): TokenId
    {
        return $this->id;
    }

    public function generatedAt(): \DateTimeImmutable
    {
        return $this->generatedAt;
    }

    public function value(): TokenValue
    {
        return $this->value;
    }

    public function expireAt(): \DateTimeImmutable
    {
        return $this->expireAt;
    }
}
