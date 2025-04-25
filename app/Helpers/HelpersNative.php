<?php
namespace App\Helpers;
class HelpersNative
{
    public static function formatNumberShort($number): string {
        if ($number >= 1000000000) {
            return round($number / 1000000000, 1) . 'B';
        } elseif ($number >= 1000000) {
            return round($number / 1000000, 1) . 'M';
        } elseif ($number >= 1000) {
            return round($number / 1000, 1) . 'K';
        }

        return (string) $number;
    }
}
