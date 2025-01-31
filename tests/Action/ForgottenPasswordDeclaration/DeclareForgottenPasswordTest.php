<?php
declare(strict_types=1);

namespace BSP\UserDomain\Tests\Action\ForgottenPasswordDeclaration;

use BSP\UserDomain\Action\ForgottenPasswordDeclaration\DeclareForgottenPassword;
use BSP\UserDomain\ValueObject\Email;
use PHPUnit\Framework\TestCase;

final class DeclareForgottenPasswordTest extends TestCase
{
    public function test_it_can_be_initialized(): void
    {
        $command = new DeclareForgottenPassword('john.snow@email.com');

        $this->assertInstanceOf(Email::class, $command->email());
    }
}
