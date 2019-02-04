<?php
declare(strict_types=1);

namespace BSP\UserDomain\Tests\Factory;

use BSP\UserDomain\Factory\UserFactory;
use BSP\UserDomain\ValueObject\Email;
use BSP\UserDomain\ValueObject\EncodedPassword;
use BSP\UserDomain\ValueObject\PlainPassword;
use BSP\UserDomain\ValueObject\UserId;
use PHPUnit\Framework\TestCase;

final class UserFactoryTest extends TestCase
{
    public function test_it_can_generate_a_user_id(): void
    {
        $id = UserFactory::generateUserId();

        $this->assertInstanceOf(UserId::class, $id);
    }

    public function test_it_can_build_a_user_id_from_uuid(): void
    {
        $id = UserFactory::userIdFromString('fake-id');

        $this->assertInstanceOf(UserId::class, $id);
    }

    public function test_it_can_build_an_email(): void
    {
        $email = UserFactory::email('john.snow@winterfell.com');

        $this->assertInstanceOf(Email::class, $email);
    }

    public function test_it_can_build_a_plain_password(): void
    {
        $password = UserFactory::plainPassword('winterIsComing');

        $this->assertInstanceOf(PlainPassword::class, $password);
    }

    public function test_it_can_build_an_encoded_password_from_plain_password(): void
    {
        $password = UserFactory::encodedPassword(UserFactory::plainPassword('winterIsComing'));

        $this->assertInstanceOf(EncodedPassword::class, $password);
    }

    public function test_it_can_build_an_encoded_password_from_hash(): void
    {
        $password = UserFactory::encodedPasswordFromHash('hash');

        $this->assertInstanceOf(EncodedPassword::class, $password);
    }
}
