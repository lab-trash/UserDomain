<?php
declare(strict_types=1);

namespace BSP\Bus;

use BSP\Action\ForgottenPasswordDeclaration\DeclareForgottenPassword;
use BSP\Action\ForgottenPasswordDeclaration\DeclareForgottenPasswordHandler;
use BSP\Action\PasswordUpdate\UpdatePassword;
use BSP\Action\PasswordUpdate\UpdatePasswordHandler;
use BSP\Action\Registration\RegisterUser;
use BSP\Action\Registration\RegisterUserHandler;
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
