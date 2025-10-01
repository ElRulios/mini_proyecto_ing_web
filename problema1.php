<?php
require_once 'classes/Navigation.php';
require_once 'classes/Statistics.php';

echo Navigation::getHeader('Problema 1: Estadísticas de 5 Números');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numbers = [
        floatval($_POST['num1']),
        floatval($_POST['num2']),
        floatval($_POST['num3']),
        floatval($_POST['num4']),
        floatval($_POST['num5'])
    ];
    
    $allPositive = true;
    foreach ($numbers as $num) {
        if ($num <= 0) {
            $allPositive = false;
            break;
        }
    }
    
    if ($allPositive) {
        $mean = Statistics::calculateMean($numbers);
        $stdDev = Statistics::calculateStandardDeviation($numbers);
        $min = Statistics::getMin($numbers);
        $max = Statistics::getMax($numbers);
        
        echo '<div class="result">
                <h2>📊 Resultados</h2>
                <div class="stat">
                    <span class="stat-label">Media:</span>
                    <span class="stat-value">' . number_format($mean, 2) . '</span>
                </div>
                <div class="stat">
                    <span class="stat-label">Desviación Estándar:</span>
                    <span class="stat-value">' . number_format($stdDev, 2) . '</span>
                </div>
                <div class="stat">
                    <span class="stat-label">Mínimo:</span>
                    <span class="stat-value">' . number_format($min, 2) . '</span>
                </div>
                <div class="stat">
                    <span class="stat-label">Máximo:</span>
                    <span class="stat-value">' . number_format($max, 2) . '</span>
                </div>
              </div>';
    } else {
        echo '<div style="background: #fff5f5; border-left: 4px solid #fc8181; padding: 20px; border-radius: 8px; margin: 20px 0;">
                <strong>❌ Error:</strong> Todos los números deben ser positivos.
              </div>';
    }
}
?>

<form method="POST">
    <label>Número 1 (positivo):</label>
    <input type="number" step="0.01" name="num1" required>
    
    <label>Número 2 (positivo):</label>
    <input type="number" step="0.01" name="num2" required>
    
    <label>Número 3 (positivo):</label>
    <input type="number" step="0.01" name="num3" required>
    
    <label>Número 4 (positivo):</label>
    <input type="number" step="0.01" name="num4" required>
    
    <label>Número 5 (positivo):</label>
    <input type="number" step="0.01" name="num5" required>
    
    <button type="submit">Calcular Estadísticas</button>
</form>

<?php
Navigation::backToMenu();
echo Navigation::getFooter();
?>