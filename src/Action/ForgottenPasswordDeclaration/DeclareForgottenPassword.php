<?php
declare(strict_types=1);

namespace BSP\UserDomain\Action\ForgottenPasswordDeclaration;

use BSP\CommandBus\Command;
use BSP\UserDomain\Factory\UserFactory;
use BSP\UserDomain\ValueObject\Email;

final class DeclareForgottenPassword implements Command
{
    private $email;

    public function __construct(?string $email)
    {
        $this->email = UserFactory::email($email);
    }

    public function email(): Email
    {
        return $this->email;
    }
}
