<?php
require_once 'classes/Navigation.php';
require_once 'classes/MathOperations.php';

echo Navigation::getHeader('Problema 9: Potencias de un Número');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numero = intval($_POST['numero']);
    
    if ($numero >= 1 && $numero <= 9) {
        $potencias = MathOperations::getPowers($numero, 15);
        
        echo '<div class="result">
                <h2>⚡ Las 15 Primeras Potencias de ' . $numero . '</h2>
                <table>
                    <tr>
                        <th>Potencia</th>
                        <th>Expresión</th>
                        <th>Resultado</th>
                    </tr>';
        
        foreach ($potencias as $potencia) {
            echo '<tr>
                    <td>Potencia ' . $potencia['exponente'] . '</td>
                    <td>' . $numero . ' <sup>' . $potencia['exponente'] . '</sup></td>
                    <td><strong>' . number_format($potencia['resultado'], 0) . '</strong></td>
                  </tr>';
        }
        
        echo '</table></div>';
        
        // Información adicional
        $ultimaPotencia = $potencias[14]['resultado'];
        echo '<div class="info">
                <strong>📊 Información adicional:</strong><br>
                • Primera potencia: ' . $numero . '<sup>1</sup> = ' . $numero . '<br>
                • Última potencia: ' . $numero . '<sup>15</sup> = ' . number_format($ultimaPotencia, 0) . '<br>
                • Crecimiento exponencial aplicado
              </div>';
        
    } else {
        echo '<div class="error">
                <strong>❌ Error:</strong> El número debe estar entre 1 y 9.
              </div>';
    }
}
?>

<form method="POST">
    <label>Ingrese un número del 1 al 9:</label>
    <input type="number" name="numero" min="1" max="9" required placeholder="Ej: 4">
    
    <div class="info">
        💡 Se calcularán las 15 primeras potencias del número ingresado.<br>
        Ejemplo: 4<sup>1</sup>, 4<sup>2</sup>, 4<sup>3</sup>, ..., 4<sup>15</sup>
    </div>
    
    <button type="submit">Calcular Potencias</button>
</form>

<?php
Navigation::backToMenu();
echo Navigation::getFooter();
?>