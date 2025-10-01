<?php
require_once 'classes/Navigation.php';
require_once 'classes/Statistics.php';

echo Navigation::getHeader('Problema 5: Clasificación por Edades');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ages = [
        intval($_POST['edad1']),
        intval($_POST['edad2']),
        intval($_POST['edad3']),
        intval($_POST['edad4']),
        intval($_POST['edad5'])
    ];
    
    $categories = [
        'Niño' => 0,
        'Adolescente' => 0,
        'Adulto' => 0,
        'Adulto Mayor' => 0
    ];
    
    $classifications = [];
    
    foreach ($ages as $index => $age) {
        $category = Statistics::classifyByAge($age);
        $classifications[] = ['persona' => $index + 1, 'edad' => $age, 'categoria' => $category];
        if (isset($categories[$category])) {
            $categories[$category]++;
        }
    }
    
    echo '<div class="result">
            <h2>👥 Clasificación Individual</h2>
            <table>
                <tr>
                    <th>Persona</th>
                    <th>Edad</th>
                    <th>Categoría</th>
                </tr>';
    
    foreach ($classifications as $class) {
        echo '<tr>
                <td>Persona ' . $class['persona'] . '</td>
                <td>' . $class['edad'] . ' años</td>
                <td><strong>' . $class['categoria'] . '</strong></td>
              </tr>';
    }
    
    echo '</table></div>';
    
    echo '<div class="result" style="margin-top: 20px;">
            <h2>📊 Estadísticas por Categoría</h2>';
    
    foreach ($categories as $cat => $count) {
        echo '<div class="stat">
                <span class="stat-label">' . $cat . ':</span>
                <span class="stat-value">' . $count . ' persona(s)</span>
              </div>';
    }
    
    echo '</div>';

    // === Gráfico de pastel con Chart.js ===
    echo '<canvas id="ageChart" width="400" height="400"></canvas>';
    echo "<script src='https://cdn.jsdelivr.net/npm/chart.js'></script>";
    echo "<script>
            const ctx = document.getElementById('ageChart').getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: " . json_encode(array_keys($categories)) . ",
                    datasets: [{
                        label: 'Clasificación por Edades',
                        data: " . json_encode(array_values($categories)) . ",
                        backgroundColor: ['#FF6384','#36A2EB','#FFCE56','#4BC0C0']
                    }]
                }
            });
          </script>";
}
?>

<form method="POST">
    <label>Edad de la Persona 1:</label>
    <input type="number" name="edad1" min="0" max="120" required>
    
    <label>Edad de la Persona 2:</label>
    <input type="number" name="edad2" min="0" max="120" required>
    
    <label>Edad de la Persona 3:</label>
    <input type="number" name="edad3" min="0" max="120" required>
    
    <label>Edad de la Persona 4:</label>
    <input type="number" name="edad4" min="0" max="120" required>
    
    <label>Edad de la Persona 5:</label>
    <input type="number" name="edad5" min="0" max="120" required>
    
    <button type="submit">Clasificar Edades</button>
</form>

<?php
Navigation::backToMenu();
echo Navigation::getFooter();
?>
