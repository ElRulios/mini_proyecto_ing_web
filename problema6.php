<?php
require_once 'classes/Navigation.php';
require_once 'classes/MathOperations.php';

echo Navigation::getHeader('Problema 6: Presupuesto Hospital');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $totalBudget = floatval($_POST['presupuesto']);

    $distribution = MathOperations::calculateDistribution($totalBudget);

    if ($distribution) {
        echo '<div class="result">
                <h2>🏥 Distribución del Presupuesto</h2>
                <p><strong>Presupuesto Total: $' . number_format($totalBudget, 2) . '</strong></p>
                <table style="margin-top: 20px; border-collapse: collapse;" border="1" cellpadding="8">
                    <tr>
                        <th>Área</th>
                        <th>Porcentaje</th>
                        <th>Presupuesto</th>
                    </tr>';

        $labels = [];
        $data = [];
        foreach ($distribution as $item) {
            $labels[] = $item["area"];
            $data[] = $item["budget"];
            echo '<tr>
                    <td>' . $item["area"] . '</td>
                    <td>' . $item["percent"] . '%</td>
                    <td>$' . number_format($item["budget"], 2) . '</td>
                  </tr>';
        }

        echo '  </table>
              </div>';

        // === Gráfico de pastel con Chart.js ===
        echo '<canvas id="budgetChart" width="400" height="400"></canvas>';
        echo "<script src='https://cdn.jsdelivr.net/npm/chart.js'></script>";
        echo "<script>
                const ctx2 = document.getElementById('budgetChart').getContext('2d');
                new Chart(ctx2, {
                    type: 'pie',
                    data: {
                        labels: " . json_encode($labels) . ",
                        datasets: [{
                            label: 'Distribución del Presupuesto',
                            data: " . json_encode($data) . ",
                            backgroundColor: ['#FF6384','#36A2EB','#FFCE56']
                        }]
                    }
                });
              </script>";
    } else {
        echo '<div class="error">
                <strong>❌ Error:</strong> Ingrese un presupuesto válido mayor a 0.
              </div>';
    }
}
?>

<form method="POST">
    <label>Presupuesto Total Anual ($):</label>
    <input type="number" step="0.01" name="presupuesto" required>
    
    <button type="submit">Calcular Distribución</button>
</form>

<?php
Navigation::backToMenu();
echo Navigation::getFooter();
?>
