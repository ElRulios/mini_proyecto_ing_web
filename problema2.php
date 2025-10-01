<?php
require_once 'classes/Navigation.php';
require_once 'classes/MathOperations.php';

echo Navigation::getHeader('Problema 2: Suma del 1 al 1000');

$sum = MathOperations::sumRange(1, 1000);

echo '<div class="result">
        <h2>➕ Resultado</h2>
        <div class="stat">
            <span class="stat-label">Suma de números del 1 al 1000:</span>
            <span class="stat-value">' . number_format($sum, 0) . '</span>
        </div>
        <p style="margin-top: 15px; color: #4a5568;">
            Fórmula utilizada: n(n+1)/2 = 1000(1001)/2 = 500,500
        </p>
      </div>';

Navigation::backToMenu();
echo Navigation::getFooter();
?>