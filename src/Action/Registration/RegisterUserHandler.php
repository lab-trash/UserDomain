<?php
declare(strict_types=1);

namespace BSP\Action\Registration;

use BSP\CommandBus\Command;
use BSP\CommandBus\CommandHandler;
use BSP\Entity\User;
use BSP\Factory\UserFactory;
use BSP\Port\IReadUser;
use BSP\Port\IWriteUser;
use BSP\Service\PasswordEncoder;
use BSP\Types\Identity;
use BSP\ValueObject\UserId;

final class RegisterUserHandler implements CommandHandler
{
    private $iReadUser;
    private $iWriteUser;

    public function __construct(IReadUser $iReadUser, IWriteUser $iWriteUser)
    {
        $this->iReadUser = $iReadUser;
        $this->iWriteUser = $iWriteUser;
    }

    /**
     * @param RegisterUser $command
     * @throws \Exception
     */
    public function handle(Command $command): void
    {
        if (!$this->iReadUser->isEmailAvailable($command->email())) {
            throw new \Exception('user.email.not_available');
        }

        $user = new User(
            UserFactory::generateUserId(),
            $command->email(),
            PasswordEncoder::hash($command->plainPassword())
        );

        $this->iWriteUser->add($user);
    }
}
