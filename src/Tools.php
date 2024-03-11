<?php

namespace JGS\Utils;

class Tools
{
    public static function formatPhone($number)
    {
        $original_number = $number;
        $number = preg_replace('/\D/', '', trim($number));
        $number = str_split($number);

        if (count($number) === 10) {
            return '(' . $number[0] . $number[1] . ') ' . $number[2] . $number[3] . $number[4] . $number[5] . '-' . $number[6] . $number[7] . $number[8] . $number[9];
        }

        if (count($number) === 11) {
            return '(' . $number[0] . $number[1] . ') ' . $number[2] . $number[3] . $number[4] . $number[5] . $number[6] . '-' . $number[7] . $number[8] . $number[9] . $number[10];
        }

        if (count($number) === 12) {
            return '+' . $number[0] . $number[1] . ' (' . $number[2] . $number[3] . ') ' . $number[4] . $number[5] . $number[6] . $number[7] . '-' . $number[8] . $number[9] . $number[10] . $number[11];
        }

        if (count($number) === 13) {
            return '+' . $number[0] . $number[1] . ' (' . $number[2] . $number[3] . ') ' . $number[4] . $number[5] . $number[6] . $number[7] . $number[8] . '-' . $number[9] . $number[10] . $number[11] . $number[12];
        }

        return $original_number;
    }
}
