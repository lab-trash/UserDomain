<?php
declare(strict_types=1);

namespace BSP\UserDomain\Bus;

use BSP\UserDomain\Action\ForgottenPasswordDeclaration\DeclareForgottenPassword;
use BSP\UserDomain\Action\ForgottenPasswordDeclaration\DeclareForgottenPasswordHandler;
use BSP\UserDomain\Action\PasswordUpdate\UpdatePassword;
use BSP\UserDomain\Action\PasswordUpdate\UpdatePasswordHandler;
use BSP\UserDomain\Action\Registration\RegisterUser;
use BSP\UserDomain\Action\Registration\RegisterUserHandler;
use BSP\CommandBus\CommandBus;

final class UserCommandBus extends CommandBus
{
    public function __construct(
        RegisterUserHandler $registerUserHandler,
        DeclareForgottenPasswordHandler $declareForgottenPasswordHandler,
        UpdatePasswordHandler $updatePasswordHandler
    ) {
        $this->handlers[RegisterUser::class] = $registerUserHandler;
        $this->handlers[DeclareForgottenPassword::class] = $declareForgottenPasswordHandler;
        $this->handlers[UpdatePassword::class] = $updatePasswordHandler;
    }
}
