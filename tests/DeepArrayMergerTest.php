<?php

namespace App\Tests;

use App\DeepArrayMerger;
use PHPUnit\Framework\TestCase;

class DeepArrayMergerTest extends TestCase
{
    private DeepArrayMerger $deepArrayMerger;

    protected function setUp(): void
    {
        $this->deepArrayMerger = new DeepArrayMerger();
    }

    public function testThatGivenArraysAreDeepMerged(): void
    {
        $array1 = [
            10 => [
                9 => [
                    8 => 'foo'
                ]
            ]
        ];
        $array2 = [
            10 => [
                9 => [
                    9 => 'bar'
                ]
            ]
        ];
        $expected = [
            10 => [
                9 => [
                    8 => 'foo',
                    9 => 'bar'
                ]
            ]
        ];
        $actual = $this->deepArrayMerger->merge($array1, $array2);
        $this->assertEquals($expected, $actual);
    }

    public function testThatGivenArraysOverrideKeys(): void
    {
        $array1 = [
            1 => [
                2 => 'foo'
            ]
        ];
        $array2 = [
            1 => [
                2 => 'bar'
            ]
        ];
        $expected = 'bar';
        $actual = $this->deepArrayMerger->merge($array1, $array2);
        $this->assertEquals($expected, $actual[1][2]);
    }
}