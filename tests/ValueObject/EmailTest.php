<?php
declare(strict_types=1);

namespace BSP\Tests\ValueObject;

use BSP\Types\String\BasicString;
use BSP\ValueObject\Email;
use PHPUnit\Framework\TestCase;

final class EmailTest extends TestCase
{
    public function test_it_can_be_initialized(): void
    {
        $email = new Email(new BasicString('john.snow@winterfell.com'));

        $this->assertSame('john.snow@winterfell.com', $email());
    }

    public function test_it_cannot_have_an_invalid_email_parameter(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('email.invalid');

        new Email(new BasicString('john snow'));
    }
}
