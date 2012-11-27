<?php
class StringUtil
{
    static public function reverse($text)
    {
        if (mb_strlen($text) <= 0) {
            throw new Exception('text is empty.');
        }
        return strrev($text);
    }
}
