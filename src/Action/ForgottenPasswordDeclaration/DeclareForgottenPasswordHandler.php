<?php
declare(strict_types=1);

namespace BSP\Action\ForgottenPasswordDeclaration;

use BSP\Bus\UserEventBus;
use BSP\CommandBus\Command;
use BSP\CommandBus\CommandHandler;
use BSP\Factory\TokenFactory;
use BSP\Port\IReadUser;
use BSP\Port\IWriteToken;

final class DeclareForgottenPasswordHandler implements CommandHandler
{
    private $iReadUser;
    private $iWriteToken;
    private $eventBus;

    public function __construct(IReadUser $iReadUser, IWriteToken $iWriteToken, UserEventBus $eventBus)
    {
        $this->iReadUser = $iReadUser;
        $this->iWriteToken = $iWriteToken;
        $this->eventBus = $eventBus;
    }

    /**
     * @param DeclareForgottenPassword $command
     * @throws \Exception
     */
    public function handle(Command $command): void
    {
        $user = $this->iReadUser->getByEmail($command->email());

        $token = TokenFactory::generateForUser($user->id());

        $this->iWriteToken->add($token);
        $this->eventBus->send(new ForgottenPasswordDeclared($user, $token));
    }
}
