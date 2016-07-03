<?php

namespace App\Components;

class Text
{
    public function trimText($text, $numChars, $char = ' ')
    {
        if (mb_strlen($text) <= $numChars) {
            return $text;
        }
        $string = mb_substr($text, 0, $numChars);
        if (false === $position = mb_strrpos($string, $char)) {
            return $text;
        }

        return mb_substr($string, 0, $position);
    }
}