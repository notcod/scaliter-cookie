<?php

namespace Scaliter;

use Scaliter\Request;

class Cookie
{
    public static function set(string $name, string $value, int $expires = 0)
    {
        $expires = $expires > 0 ? time() + 86400 * $expires : 0;
        setcookie($name, $value, $expires, path: '/');
        return $value;
    }
    public static function get(string $name)
    {
        return Request::cookie($name)->fn('clear')->value;
    }
    public static function unset(string $name)
    {
        setcookie($name, "");
    }
}