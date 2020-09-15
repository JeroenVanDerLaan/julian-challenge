<?php

declare(strict_types =1);

namespace App;

use InvalidArgumentException;
use function explode;
use function is_numeric;

class IntegerParser
{
    /**
     * @param string $string
     * @param string $delimiter
     * @return int[]
     */
    public function parse(string $string, string $delimiter): array
    {
        if (true === empty($delimiter)) {
            throw new InvalidArgumentException('Given delimiter can not be empty');
        }
        $parts = explode($delimiter, $string);
        $parts = false !== $parts ? $parts : [];
        $indices = [];
        foreach ($parts as $part) {
            if (true === is_numeric($part)) {
                $indices[] = (int) $part;
            }
        }
        return $indices;
    }
}