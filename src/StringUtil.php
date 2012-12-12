<?php
class StringUtil
{
    static public function reverse($text)
    {
        // エンコーディング
        $encoding = 'UTF-8';

        if (mb_strlen($text, $encoding) <= 0) {
            throw new Exception('text is empty.');
        }
        $reverseText = '';
        // 一番単純なやつ
        for ($i = 1; $i <= mb_strlen($text, $encoding); $i++) {
            $reverseText .= mb_substr($text, $i * -1, 1, $encoding);
        }
        return $reverseText;
    }

    static public function toUpper($text) {
        if (mb_strlen($text) <= 0) {
            throw new Exception('text is empty.');
        }
        return strtoupper($text);
    }
    
    static public function addSpace($text) {
        $result = '';
        $length = strlen($text);
        for ($i = 0; $i < $length; $i++) {
            if ($i > 0) {
                $result .= ' ';
            }
            $result .= $text[$i];
        }
        
        return $result;
    }
}
