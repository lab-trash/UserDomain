<?php
declare(strict_types=1);

namespace BSP\UserDomain\Action\Registration;

use BSP\UserDomain\Bus\UserEventBus;
use BSP\CommandBus\Command;
use BSP\CommandBus\CommandHandler;
use BSP\UserDomain\Entity\User;
use BSP\UserDomain\Factory\UserFactory;
use BSP\UserDomain\Port\IReadUser;
use BSP\UserDomain\Port\IWriteUser;
use BSP\UserDomain\Service\PasswordEncoder;

final class RegisterUserHandler implements CommandHandler
{
    private $iReadUser;
    private $iWriteUser;
    private $eventBus;

    public function __construct(IReadUser $iReadUser, IWriteUser $iWriteUser, UserEventBus $eventBus)
    {
        $this->iReadUser = $iReadUser;
        $this->iWriteUser = $iWriteUser;
        $this->eventBus = $eventBus;
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
        $this->eventBus->send(new UserRegistered($user));
    }
}
