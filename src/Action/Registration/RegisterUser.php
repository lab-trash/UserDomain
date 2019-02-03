<?php
declare(strict_types=1);

namespace BSP\Action\Registration;

use BSP\CommandBus\Command;
use BSP\Factory\UserFactory;
use BSP\ValueObject\Email;
use BSP\ValueObject\PlainPassword;

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
