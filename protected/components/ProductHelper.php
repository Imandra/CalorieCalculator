<?php

class ProductHelper
{
    /**
     * Реализует функционал ucfirst для мультибайтовой кодировки
     * @param string $string
     * @param string $enc
     * @return string
     */
    public static function str_mb_ucfirst($string, $enc = 'UTF-8')
    {
        return mb_strtoupper(mb_substr($string, 0, 1, $enc), $enc) .
            mb_substr($string, 1, mb_strlen($string, $enc), $enc);
    }
}