<?php
declare(strict_types=1);

namespace BSP\UserDomain\Action\ForgottenPasswordDeclaration;

use BSP\UserDomain\Entity\Token;
use BSP\UserDomain\Entity\User;
use BSP\EventBus\Event;

final class ForgottenPasswordDeclared implements Event
{
    private $user;
    private $token;

    public function __construct(User $user, Token $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    public function user(): User
    {
        return $this->user;
    }

    public function token(): Token
    {
        return $this->token;
    }
}
