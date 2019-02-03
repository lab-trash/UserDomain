<?php
declare(strict_types=1);

namespace BSP\Action\ForgottenPasswordDeclaration;

use BSP\CommandBus\Command;
use BSP\Factory\UserFactory;
use BSP\ValueObject\Email;

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
