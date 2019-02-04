<?php
declare(strict_types=1);

namespace BSP\UserDomain\Entity;

use BSP\UserDomain\ValueObject\Email;
use BSP\UserDomain\ValueObject\EncodedPassword;
use BSP\UserDomain\ValueObject\UserId;

final class User
{
    private $id;
    private $email;
    private $password;

    public function __construct(
        UserId $userId,
        Email $email,
        EncodedPassword $encodedPassword
    ) {
        $this->id = $userId;
        $this->email = $email;
        $this->password = $encodedPassword;
    }

    public function id(): UserId
    {
        return $this->id;
    }

    public function email(): Email
    {
        return $this->email;
    }

    public function password(): EncodedPassword
    {
        return $this->password;
    }
}
