<?php

namespace App\Tests;

use App\DeepArrayFactory;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class DeepArrayFactoryTest extends TestCase
{
    private DeepArrayFactory $deepArrayFactory;

    protected function setUp(): void
    {
        $this->deepArrayFactory = new DeepArrayFactory();
    }

    public function testThatEachIndexIsUsedToCreateNewArrayDimension(): void
    {
        $value = 'foo';
        $indices = [10, 9, 8];
        $expected = [
            10 => [
                9 => [
                    8 => $value
                ]
            ]
        ];
        $actual = $this->deepArrayFactory->fill($value, ...$indices);
        $this->assertEquals($expected, $actual);
    }

    public function testThatGivenValueIsAssignedToDeepestGivenIndex(): void
    {
        $value = 'foo';
        $indices = [10, 9, 8];
        $actual = $this->deepArrayFactory->fill($value, ...$indices);
        $this->assertEquals($value, $actual[10][9][8]);
    }

    public function testThatExceptionIsThrownWhenNoIndicesAreGiven(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $value = 'foo';
        $indices = [];
        $this->deepArrayFactory->fill($value, ...$indices);
    }
}