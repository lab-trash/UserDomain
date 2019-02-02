<?php
declare(strict_types=1);

namespace BSP\Service;

use BSP\Types\Contracts\IString;
use BSP\Types\String\BasicString;
use BSP\ValueObject\EncodedPassword;

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
