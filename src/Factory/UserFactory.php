<?php
declare(strict_types=1);

namespace BSP\Factory;

use BSP\Service\PasswordEncoder;
use BSP\Types\Identity;
use BSP\Types\String\BasicString;
use BSP\ValueObject\Email;
use BSP\ValueObject\EncodedPassword;
use BSP\ValueObject\PlainPassword;
use BSP\ValueObject\UserId;

final class UserFactory
{
    public static function generateUserId(): UserId
    {
        $id = Identity::generate();

        return new UserId($id);
    }

    public static function userIdFromString(string $uuid): UserId
    {
        $id = Identity::fromString($uuid);

        return new UserId($id);
    }

    public static function email(?string $email): Email
    {
        $email = new BasicString($email);

        return new Email($email);
    }

    public static function plainPassword(?string $password): PlainPassword
    {
        $password = new BasicString($password);

        return new PlainPassword($password);
    }

    public static function encodedPassword(PlainPassword $password): EncodedPassword
    {
        return PasswordEncoder::hash($password);
    }

    public static function encodedPasswordFromHash(string $hash): EncodedPassword
    {
        $hash = new BasicString($hash);

        return new EncodedPassword($hash);
    }
}
