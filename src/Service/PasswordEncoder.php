<?php
declare(strict_types=1);

namespace BSP\UserDomain\Service;

use BSP\Types\Contracts\IString;
use BSP\Types\String\BasicString;
use BSP\UserDomain\Exception\InternalException;
use BSP\UserDomain\ValueObject\EncodedPassword;
use BSP\UserDomain\ValueObject\PlainPassword;

final class PasswordEncoder
{
    /**
     * @throws InternalException
     */
    public static function hash(PlainPassword $plainPassword): EncodedPassword
    {
        $hash = password_hash($plainPassword(), PASSWORD_BCRYPT);

        if (false === $hash) {
            throw new InternalException('password_encoder.hash.failed');
        }

        return new EncodedPassword(new BasicString($hash));
    }

    public static function verify(IString $plainPassword, IString $hash): bool
    {
        return password_verify($plainPassword(), $hash());
    }
}
