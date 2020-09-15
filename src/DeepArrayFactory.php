<?php

declare(strict_types=1);

namespace App;

use InvalidArgumentException;
use function array_shift;

class DeepArrayFactory
{
    /**
     * @param string $value
     * @param int ...$indices
     * @return array
     */
    public function fill(string $value, int ...$indices): array
    {
        $array = [];
        $index = array_shift($indices);
        if (null === $index) {
            throw new InvalidArgumentException('Given indices can not be empty');
        }
        if (false === empty($indices)) {
            $array[$index] = $this->fill($value, ...$indices);
        } else {
            $array[$index] = $value;
        }
        return $array;
    }
}