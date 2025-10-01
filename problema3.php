<?php
require_once 'classes/Navigation.php';
require_once 'classes/MathOperations.php';

echo Navigation::getHeader('Problema 3: Múltiplos de 4');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $n = intval($_POST['cantidad']);
    
    if ($n > 0 && $n <= 1000) {
        $multiples = MathOperations::getMultiples(4, $n);
        
        echo '<div class="result">
                <h2>✖️ Primeros ' . $n . ' Múltiplos de 4</h2>
                <table>
                    <tr>
                        <th>Multiplicador</th>
                        <th>Operación</th>
                        <th>Resultado</th>
                    </tr>';
        
        foreach ($multiples as $mult) {
            echo '<tr>
                    <td>' . $mult['multiplicador'] . '</td>
                    <td>4 × ' . $mult['multiplicador'] . '</td>
                    <td><strong>' . number_format($mult['resultado'], 0) . '</strong></td>
                  </tr>';
        }
        
        echo '</table></div>';
    } else {
        echo '<div style="background: #fff5f5; border-left: 4px solid #fc8181; padding: 20px; border-radius: 8px; margin: 20px 0;">
                <strong>❌ Error:</strong> Ingrese un número entre 1 y 1000.
              </div>';
    }
}
?>

<form method="POST">
    <label>¿Cuántos múltiplos de 4 desea calcular? (máx. 1000):</label>
    <input type="number" name="cantidad" min="1" max="1000" required>
    <button type="submit">Calcular Múltiplos</button>
</form>

<?php
Navigation::backToMenu();
echo Navigation::getFooter();
?>