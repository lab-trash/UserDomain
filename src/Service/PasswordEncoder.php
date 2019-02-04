<?php
declare(strict_types=1);

namespace BSP\UserDomain\Service;

use BSP\Types\Contracts\IString;
use BSP\Types\String\BasicString;
use BSP\UserDomain\ValueObject\EncodedPassword;

final class PasswordEncoder
{
    public static function hash(IString $plainPassword): EncodedPassword
    {
        return new EncodedPassword(
            new BasicString(password_hash($plainPassword(), PASSWORD_BCRYPT))
        );
    }

    public static function verify(IString $plainPassword, IString $hash): bool
    {
        return password_verify($plainPassword(), $hash());
    }
}
