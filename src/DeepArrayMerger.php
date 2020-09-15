<?php

declare(strict_types=1);

namespace App;

use function is_array;

class DeepArrayMerger
{
    /**
     * @param array ...$arrays
     * @return array
     */
    public function merge(array ...$arrays): array
    {
        $result = [];
        foreach ($arrays as $array) {
            foreach ($array as $key => $value) {
                if (false === isset($result[$key])) {
                    $result[$key] = $value;
                    continue;
                }
                if (false === is_array($value) || false === is_array($result[$key])) {
                    $result[$key] = $value;
                    continue;
                }
                $result[$key] = $this->merge($result[$key], $value);
            }
        }
        return $result;
    }
}