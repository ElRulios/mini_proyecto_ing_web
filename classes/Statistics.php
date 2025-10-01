<?php

class Statistics
{
    public static function calculateMean($numbers)
    {
        return array_sum($numbers) / count($numbers);
    }
    
    public static function calculateStandardDeviation($numbers)
    {
        $mean = self::calculateMean($numbers);
        $variance = 0;
        
        foreach ($numbers as $number) {
            $variance += pow($number - $mean, 2);
        }
        
        $variance = $variance / count($numbers);
        return sqrt($variance);
    }
    
    public static function getMin($numbers)
    {
        return min($numbers);
    }
    
    public static function getMax($numbers)
    {
        return max($numbers);
    }
    
    public static function classifyByAge($age)
    {
        if ($age >= 0 && $age <= 12) {
            return 'Niño';
        } elseif ($age >= 13 && $age <= 17) {
            return 'Adolescente';
        } elseif ($age >= 18 && $age <= 64) {
            return 'Adulto';
        } elseif ($age >= 65) {
            return 'Adulto Mayor';
        }
        return 'Edad inválida';
    }
}