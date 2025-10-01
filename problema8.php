<?php
require_once 'classes/Navigation.php';
require_once 'classes/SeasonCalculator.php';

echo Navigation::getHeader('Problema 8: Estación del Año');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fecha = $_POST['fecha']; // formato: YYYY-MM-DD

    if ($fecha) {
        $dateParts = explode('-', $fecha);
        $year = intval($dateParts[0]);
        $month = intval($dateParts[1]);
        $day = intval($dateParts[2]);

        // Validar fecha
        if (checkdate($month, $day, $year)) {
            $season = SeasonCalculator::getSeason($month, $day);

            $monthNames = [
                1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
                5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
                9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
            ];

            echo '<div class="result">
                    <h2>🌍 Resultado</h2>
                    <div class="stat">
                        <span class="stat-label">Fecha ingresada:</span>
                        <span class="stat-value">' . $day . ' de ' . $monthNames[$month] . ' de ' . $year . '</span>
                    </div>
                    <div class="stat">
                        <span class="stat-label">Estación del Año:</span>
                        <span class="stat-value" style="font-size: 1.5em;">' . $season . '</span>
                    </div>
                  </div>';

            echo '<div class="info" style="margin-top: 20px;">
                    <strong>📅 Referencia de Estaciones (Hemisferio Sur):</strong><br>
                    ☀️ <strong>Verano:</strong> Del 21 de diciembre al 20 de marzo<br>
                    🍂 <strong>Otoño:</strong> Del 21 de marzo al 21 de junio<br>
                    ❄️ <strong>Invierno:</strong> Del 22 de junio al 22 de septiembre<br>
                    🌸 <strong>Primavera:</strong> Del 23 de septiembre al 20 de diciembre
                  </div>';
        } else {
            echo '<div class="error">
                    <strong>❌ Error:</strong> La fecha ingresada no es válida.
                  </div>';
        }
    }
}
?>

<form method="POST">
    <label>Seleccione una fecha:</label>
    <input type="date" name="fecha" required>
    <button type="submit">Determinar Estación</button>
</form>

<div class="info">
    <strong>💡 Ejemplos de prueba:</strong><br>
    • 25 de Diciembre de 2025 = ☀️ Verano<br>
    • 15 de Abril de 2025 = 🍂 Otoño<br>
    • 1 de Julio de 2025 = ❄️ Invierno<br>
    • 15 de Octubre de 2025 = 🌸 Primavera
</div>

<?php
Navigation::backToMenu();
echo Navigation::getFooter();
?>
