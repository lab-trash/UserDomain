<?php
declare(strict_types=1);

namespace BSP\UserDomain\Action\Registration;

use BSP\CommandBus\Command;
use BSP\UserDomain\Factory\UserFactory;
use BSP\UserDomain\ValueObject\Email;
use BSP\UserDomain\ValueObject\PlainPassword;

final class RegisterUser implements Command
{
    private $email;
    private $plainPassword;

    public function __construct(?string $email, ?string $password)
    {
        $this->email = UserFactory::email($email);
        $this->plainPassword = UserFactory::plainPassword($password);
    }

    public function email(): Email
    {
        return $this->email;
    }

    public function plainPassword(): PlainPassword
    {
        return $this->plainPassword;
    }
}
