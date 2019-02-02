<?php
declare(strict_types=1);

namespace BSP\ValueObject;

use Assert\Assert;
use BSP\Types\Contracts\IString;

final class Email implements IString
{
    private $value;

    public function __construct(IString $string)
    {
        Assert::that($string())->email('email.invalid');

        $this->value = $string();
    }

    public function __invoke(): string
    {
        return $this->value;
    }
}
