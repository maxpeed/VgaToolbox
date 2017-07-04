<?php
/**
 * Created: 2017-07-04 16:31
 */

namespace Vgait\Toolbox\Tests;

use Vgait\Toolbox\Validation;
use PHPUnit\Framework\TestCase;

class ValidationTest extends TestCase
{

    public function testValidateString()
    {
        $string = "string";
        self::assertTrue(Validation::isString($string));
    }

    public function testInvalidateString()
    {
        $invalidString = [];

        self::assertFalse(Validation::isString($invalidString));
    }
}
