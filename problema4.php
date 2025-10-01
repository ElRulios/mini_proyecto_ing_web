<?php
require_once 'classes/Navigation.php';
require_once 'classes/MathOperations.php';

echo Navigation::getHeader('Problema 4: Suma de Pares e Impares (1-200)');

$sums = MathOperations::sumEvenOdd(1, 200);

echo '<div class="result">
        <h2>🔢 Resultados</h2>
        <div class="stat">
            <span class="stat-label">Suma de números PARES (2, 4, 6, ..., 200):</span>
            <span class="stat-value">' . number_format($sums['even'], 0) . '</span>
        </div>
        <div class="stat">
            <span class="stat-label">Suma de números IMPARES (1, 3, 5, ..., 199):</span>
            <span class="stat-value">' . number_format($sums['odd'], 0) . '</span>
        </div>
        <div class="stat">
            <span class="stat-label">Suma TOTAL:</span>
            <span class="stat-value">' . number_format($sums['even'] + $sums['odd'], 0) . '</span>
        </div>
      </div>';

Navigation::backToMenu();
echo Navigation::getFooter();
?>