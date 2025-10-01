<?php

class MathOperations
{
    public static function sumRange($start, $end)
    {
        return ($end * ($end + 1)) / 2 - (($start - 1) * $start) / 2;
    }
    
    public static function getMultiples($base, $count)
    {
        $multiples = [];
        for ($i = 1; $i <= $count; $i++) {
            $multiples[] = [
                'multiplicador' => $i,
                'resultado' => $base * $i
            ];
        }
        return $multiples;
    }
    
    public static function sumEvenOdd($start, $end)
    {
        $sumEven = 0;
        $sumOdd = 0;
        
        for ($i = $start; $i <= $end; $i++) {
            if ($i % 2 === 0) {
                $sumEven += $i;
            } else {
                $sumOdd += $i;
            }
        }
        
        return ['even' => $sumEven, 'odd' => $sumOdd];
    }
    
    public static function getPowers($base, $count)
    {
        $powers = [];
        for ($i = 1; $i <= $count; $i++) {
            $powers[] = [
                'exponente' => $i,
                'resultado' => pow($base, $i)
            ];
        }
        return $powers;
    }

    public static function calculateDistribution($totalBudget)
    {
        if ($totalBudget <= 0) {
            return null;
        }

        // Porcentajes fijos
        $distribution = [
            "Ginecología"   => 40,
            "Traumatología" => 35,
            "Pediatría"     => 25
        ];

        $result = [];
        foreach ($distribution as $area => $percent) {
            $result[] = [
                "area"       => $area,
                "percent"    => $percent,
                "budget"     => ($percent / 100) * $totalBudget
            ];
        }

        return $result;
    }
}