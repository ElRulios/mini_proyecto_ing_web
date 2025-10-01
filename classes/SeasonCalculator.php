<?php
class SeasonCalculator
{
    public static function getSeason($month, $day)
    {
        if (($month == 12 && $day >= 21) || ($month >= 1 && $month <= 2) || ($month == 3 && $day < 21)) {
            return '☀️ Verano';
        } elseif (($month == 3 && $day >= 21) || ($month >= 4 && $month <= 5) || ($month == 6 && $day <= 21)) {
            return '🍂 Otoño';
        } elseif (($month == 6 && $day >= 22) || ($month >= 7 && $month <= 8) || ($month == 9 && $day <= 22)) {
            return '❄️ Invierno';
        } else {
            return '🌸 Primavera';
        }
    }
}
