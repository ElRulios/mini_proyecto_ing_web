<?php
require_once 'classes/Navigation.php';
require_once 'classes/Statistics.php';

echo Navigation::getHeader('Problema 7: Estadísticas de Notas');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['cantidad']) && !isset($_POST['cantidad_notas'])) {
        // Paso 1: Mostrar formulario para ingresar las notas
        $cantidad = intval($_POST['cantidad']);
        
        if ($cantidad > 0 && $cantidad <= 50) {
            echo '<div class="info">
                    📝 Ingrese las <strong>' . $cantidad . '</strong> notas
                  </div>';
            
            echo '<form method="POST">
                    <input type="hidden" name="cantidad_notas" value="' . $cantidad . '">';
            
            for ($i = 1; $i <= $cantidad; $i++) {
                echo '<label>Nota ' . $i . ':</label>
                      <input type="number" step="0.01" name="nota' . $i . '" min="0" max="100" required>';
            }
            
            echo '<button type="submit">Calcular Estadísticas</button>
                  </form>';
        } else {
            echo '<div class="error">
                    <strong>❌ Error:</strong> Ingrese una cantidad entre 1 y 50.
                  </div>';
            
            echo '<form method="POST">
                    <label>¿Cuántas notas desea ingresar?</label>
                    <input type="number" name="cantidad" min="1" max="50" required>
                    <button type="submit">Continuar</button>
                  </form>';
        }
    } elseif (isset($_POST['cantidad_notas'])) {
        // Paso 2: Calcular estadísticas
        $cantidad = intval($_POST['cantidad_notas']);
        $notas = [];
        
        // Usar foreach para recorrer los datos POST
        foreach ($_POST as $key => $value) {
            if (strpos($key, 'nota') === 0 && $key !== 'nota') {
                $notas[] = floatval($value);
            }
        }
        
        if (count($notas) > 0) {
            $promedio = Statistics::calculateMean($notas);
            $desviacion = Statistics::calculateStandardDeviation($notas);
            $minima = Statistics::getMin($notas);
            $maxima = Statistics::getMax($notas);
            
            echo '<div class="result">
                    <h2>📊 Resultados Estadísticos</h2>
                    
                    <div class="stat">
                        <span class="stat-label">Cantidad de Notas:</span>
                        <span class="stat-value">' . count($notas) . '</span>
                    </div>
                    
                    <div class="stat">
                        <span class="stat-label">Promedio:</span>
                        <span class="stat-value">' . number_format($promedio, 2) . '</span>
                    </div>
                    
                    <div class="stat">
                        <span class="stat-label">Desviación Estándar:</span>
                        <span class="stat-value">' . number_format($desviacion, 2) . '</span>
                    </div>
                    
                    <div class="stat">
                        <span class="stat-label">Nota Mínima:</span>
                        <span class="stat-value">' . number_format($minima, 2) . '</span>
                    </div>
                    
                    <div class="stat">
                        <span class="stat-label">Nota Máxima:</span>
                        <span class="stat-value">' . number_format($maxima, 2) . '</span>
                    </div>
                  </div>';
            
            echo '<div class="result" style="margin-top: 20px;">
                    <h2>📋 Listado de Notas</h2>
                    <table>
                        <tr>
                            <th>N°</th>
                            <th>Nota</th>
                            <th>Estado</th>
                        </tr>';
            
            $contador = 1;
            foreach ($notas as $nota) {
                $estado = $nota >= $promedio ? '✅ Sobre el promedio' : '⚠️ Bajo el promedio';
                $color = $nota >= $promedio ? 'color: #22543d;' : 'color: #c53030;';
                
                echo '<tr>
                        <td>' . $contador . '</td>
                        <td><strong>' . number_format($nota, 2) . '</strong></td>
                        <td style="' . $color . '">' . $estado . '</td>
                      </tr>';
                $contador++;
            }
            
            echo '</table></div>';
        }
    }
} else {
    // Formulario inicial
    echo '<form method="POST">
            <label>¿Cuántas notas desea ingresar?</label>
            <input type="number" name="cantidad" min="1" max="50" required placeholder="Ej: 5">
            <button type="submit">Continuar</button>
          </form>';
}

Navigation::backToMenu();
echo Navigation::getFooter();
?>