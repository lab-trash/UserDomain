<?php
declare(strict_types=1);

namespace BSP\Action\PasswordUpdate;

use BSP\CommandBus\Command;
use BSP\Factory\TokenFactory;
use BSP\Factory\UserFactory;
use BSP\ValueObject\PlainPassword;
use BSP\ValueObject\TokenValue;

final class UpdatePassword implements Command
{
    private $tokenValue;
    private $plainPassword;

    public function __construct(?string $token, ?string $password)
    {
        $this->tokenValue = TokenFactory::tokenValue($token);
        $this->plainPassword = UserFactory::plainPassword($password);
    }

    public function tokenValue(): TokenValue
    {
        return $this->tokenValue;
    }

    public function plainPassword(): PlainPassword
    {
        return $this->plainPassword;
    }
}
