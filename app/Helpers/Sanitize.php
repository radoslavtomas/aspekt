<?php

namespace App\Helpers;

class Sanitize
{
    public array $filters = [
        'string' => FILTER_SANITIZE_STRING,
        'string[]' => [
            'filter' => FILTER_SANITIZE_STRING,
            'flags' => FILTER_REQUIRE_ARRAY
        ],
        'email' => FILTER_SANITIZE_EMAIL,
        'int' => [
            'filter' => FILTER_SANITIZE_NUMBER_INT,
            'flags' => FILTER_REQUIRE_SCALAR
        ],
        'int[]' => [
            'filter' => FILTER_SANITIZE_NUMBER_INT,
            'flags' => FILTER_REQUIRE_ARRAY
        ],
        'float' => [
            'filter' => FILTER_SANITIZE_NUMBER_FLOAT,
            'flags' => FILTER_FLAG_ALLOW_FRACTION
        ],
        'float[]' => [
            'filter' => FILTER_SANITIZE_NUMBER_FLOAT,
            'flags' => FILTER_REQUIRE_ARRAY
        ],
        'url' => FILTER_SANITIZE_URL,
        'bool' => FILTER_VALIDATE_BOOLEAN
    ];

    /**
     * Recursively trim strings in an array
     * @param array $items
     * @return array
     */
    private function array_trim(array $items): array
    {
        return array_map(function ($item) {
            if (is_string($item)) {
                return trim($item);
            } elseif (is_array($item)) {
                return $this->array_trim($item);
            } else
                return $item;
        }, $items);
    }

    /**
     * Sanitize the inputs based on the rules an optionally trim the string
     * @param array $inputs
     * @param array $fields
     * @param int $default_filter FILTER_SANITIZE_STRING
     * @param array $filters FILTERS
     * @param bool $trim
     * @return array
     */
    function sanitize(array $inputs, array $fields = [], int $default_filter = FILTER_SANITIZE_STRING, bool $trim = true): array
    {
        if ($fields) {
            $options = array_map(fn($field) => $this->filters[$field], $fields);
            $data = filter_var_array($inputs, $options);
        } else {
            $data = filter_var_array($inputs, $default_filter);
        }

        return $trim ? $this->array_trim($data) : $data;
    }
}
