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
			// This state probably wont happen, because of this reasons:
			// 1) Fill would fail if this var was supplied: $indices = [0,1,2,null];
			// Because of the type declaration: int ... 
			// php will throw fatal errors if [0,1,2,null] would be supplied to fill(). 
			// The parse method of IntegerParser type casts to int. A null would become int 0.
			// 
			// 2) array_shift return NULL when an empty array is supplied. 
			// The fill method stops calling itself when the indices array is empty. 
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