<?php

namespace App\Tests;

use App\IntegerParser;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class IntegerParserTest extends TestCase
{
    private IntegerParser $integerParser;

    protected function setUp(): void
    {
        $this->integerParser = new IntegerParser();
    }

    public function testThatGivenDelimiterIsUsedToSeparateIntegers(): void
    {
        $string = '10/9/8/7/6/5';
        $expected = [10, 9, 8, 7, 6, 5];
        $actual = $this->integerParser->parse($string, '/');
        $this->assertEquals($expected, $actual);
    }

    public function testThatNonNumericValuesAreFilteredOut(): void
    {
        $string = '10/foo/8/7/bar/5';
        $expected = [10, 8, 7, 5];
        $actual = $this->integerParser->parse($string, '/');
        $this->assertEquals($expected, $actual);
    }

    public function testThatExceptionIsThrownWhenGivenDelimiterIsEmpty(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $string = '10/9/8/7/6/5';
        $this->integerParser->parse($string, '');
    }
}