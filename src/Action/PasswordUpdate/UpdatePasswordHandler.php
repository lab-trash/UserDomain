<?php
declare(strict_types=1);

namespace BSP\UserDomain\Action\PasswordUpdate;

use BSP\UserDomain\Bus\UserEventBus;
use BSP\CommandBus\Command;
use BSP\CommandBus\CommandHandler;
use BSP\UserDomain\Entity\User;
use BSP\UserDomain\Factory\UserFactory;
use BSP\UserDomain\Port\IReadToken;
use BSP\UserDomain\Port\IReadUser;
use BSP\UserDomain\Port\IWriteUser;

final class UpdatePasswordHandler implements CommandHandler
{
    private $iReadToken;
    private $iReadUser;
    private $IWriteUser;
    private $eventBus;

    public function __construct(
        IReadToken $iReadToken,
        IReadUser $iReadUser,
        IWriteUser $IWriteUser,
        UserEventBus $eventBus
    ) {
        $this->iReadToken = $iReadToken;
        $this->iReadUser = $iReadUser;
        $this->IWriteUser = $IWriteUser;
        $this->eventBus = $eventBus;
    }

    /**
     * @param UpdatePassword $command
     * @throws \Exception
     */
    public function handle(Command $command): void
    {
        $token = $this->iReadToken->getByTokenValue($command->tokenValue());

        if ($token->isExpired()) {
            throw new \Exception('password_token.expired');
        }

        $user = $this->iReadUser->getByUserId(UserFactory::userIdFromString($token->id()()));

        $updatedUser = new User(
            $user->id(),
            $user->email(),
            UserFactory::encodedPassword($command->plainPassword())
        );

        $this->IWriteUser->add($updatedUser);
        $this->eventBus->send(new PasswordUpdated($updatedUser));
    }
}
