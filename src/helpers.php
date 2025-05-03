<?php

use Illuminate\Support\Str;

if (! function_exists('encodeClassWithParams')) {
    function encodeClassWithParams(string $class, array $params = []): string
    {
        if (empty($params)) {
            return $class;
        }

        return $class.'?'.http_build_query($params, '', '&', PHP_QUERY_RFC3986);
    }
}

if (! function_exists('decodeClassWithParams')) {
    function decodeClassWithParams(string $string): array
    {
        [$class, $query] = array_pad(explode('?', $string, 2), 2, null);

        $params = [];
        if ($query) {
            parse_str($query, $params);
        }

        return [$class, $params];
    }
}

if (! function_exists('convertClassToBaseSnake')) {

    function convertClassToBaseSnake($class)
    {
        return Str::snake(class_basename($class));
    }
}
