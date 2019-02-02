<?php
declare(strict_types=1);

namespace BSP\Action\Registration;

use BSP\CommandBus\Command;
use BSP\Types\String\BasicString;
use BSP\ValueObject\Email;
use BSP\ValueObject\PlainPassword;

final class RegisterUser implements Command
{
    private $email;
    private $plainPassword;

    public function __construct(?string $email, ?string $password)
    {
        $this->email = new Email(new BasicString($email));
        $this->plainPassword = new PlainPassword(new BasicString($password));
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
