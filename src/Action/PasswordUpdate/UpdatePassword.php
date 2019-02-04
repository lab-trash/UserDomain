<?php
declare(strict_types=1);

namespace BSP\UserDomain\Action\PasswordUpdate;

use BSP\CommandBus\Command;
use BSP\UserDomain\Factory\TokenFactory;
use BSP\UserDomain\Factory\UserFactory;
use BSP\UserDomain\ValueObject\PlainPassword;
use BSP\UserDomain\ValueObject\TokenValue;

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
