<?php
require_once 'classes/Navigation.php';

echo Navigation::getHeader('Problema 10: Sistema de Ventas');

// Inicializar variables de sesión si no existen
session_start();

if (!isset($_SESSION['ventas'])) {
    $_SESSION['ventas'] = array_fill(0, 5, array_fill(0, 4, 0)); // 5 productos x 4 vendedores
}

if (!isset($_SESSION['vendedores'])) {
    $_SESSION['vendedores'] = [
        1 => ['nombre' => '', 'apellido' => ''],
        2 => ['nombre' => '', 'apellido' => ''],
        3 => ['nombre' => '', 'apellido' => ''],
        4 => ['nombre' => '', 'apellido' => '']
    ];
}

// Procesar formulario de registro de vendedor
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registrar_vendedor'])) {
    $numeroVendedor = intval($_POST['numero_vendedor']);
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    
    if ($numeroVendedor >= 1 && $numeroVendedor <= 4 && !empty($nombre) && !empty($apellido)) {
        $_SESSION['vendedores'][$numeroVendedor] = [
            'nombre' => $nombre,
            'apellido' => $apellido
        ];
        
        echo '<div class="result">
                <h2>✅ Vendedor Registrado</h2>
                <p>Vendedor #' . $numeroVendedor . ': ' . $nombre . ' ' . $apellido . '</p>
              </div>';
    }
}

// Procesar formulario de venta
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registrar_venta'])) {
    $numeroVendedor = intval($_POST['vendedor']) - 1; // Convertir a índice 0-3
    $numeroProducto = intval($_POST['producto']) - 1; // Convertir a índice 0-4
    $valorVenta = floatval($_POST['valor']);
    
    if ($numeroVendedor >= 0 && $numeroVendedor <= 3 && 
        $numeroProducto >= 0 && $numeroProducto <= 4 && 
        $valorVenta > 0) {
        
        $_SESSION['ventas'][$numeroProducto][$numeroVendedor] += $valorVenta;
        
        echo '<div class="result">
                <h2>✅ Venta Registrada</h2>
                <p>Vendedor #' . ($numeroVendedor + 1) . ' - Producto #' . ($numeroProducto + 1) . ' - $' . number_format($valorVenta, 2) . '</p>
              </div>';
    }
}

// Limpiar datos
if (isset($_POST['limpiar_datos'])) {
    $_SESSION['ventas'] = array_fill(0, 5, array_fill(0, 4, 0));
    $_SESSION['vendedores'] = [
        1 => ['nombre' => '', 'apellido' => ''],
        2 => ['nombre' => '', 'apellido' => ''],
        3 => ['nombre' => '', 'apellido' => ''],
        4 => ['nombre' => '', 'apellido' => '']
    ];
    
    echo '<div class="result">
            <h2>🗑️ Datos Limpiados</h2>
            <p>Todos los datos han sido reiniciados.</p>
          </div>';
}

?>

<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
    <!-- Formulario de Registro de Vendedor -->
    <div>
        <h2 style="color: #667eea; margin-bottom: 15px;">👤 Registrar Vendedor</h2>
        <form method="POST" style="background: #f7fafc; padding: 20px; border-radius: 10px;">
            <label>Número de Vendedor (1-4):</label>
            <select name="numero_vendedor" required>
                <option value="">Seleccione...</option>
                <option value="1">Vendedor 1</option>
                <option value="2">Vendedor 2</option>
                <option value="3">Vendedor 3</option>
                <option value="4">Vendedor 4</option>
            </select>
            
            <label>Nombre:</label>
            <input type="text" name="nombre" required>
            
            <label>Apellido:</label>
            <input type="text" name="apellido" required>
            
            <button type="submit" name="registrar_vendedor">Registrar Vendedor</button>
        </form>
    </div>
    
    <!-- Formulario de Registro de Venta -->
    <div>
        <h2 style="color: #667eea; margin-bottom: 15px;">💰 Registrar Venta</h2>
        <form method="POST" style="background: #f7fafc; padding: 20px; border-radius: 10px;">
            <label>Vendedor:</label>
            <select name="vendedor" required>
                <option value="">Seleccione...</option>
                <?php
                for ($i = 1; $i <= 4; $i++) {
                    $vendedor = $_SESSION['vendedores'][$i];
                    $nombreCompleto = !empty($vendedor['nombre']) ? 
                        $vendedor['nombre'] . ' ' . $vendedor['apellido'] : 
                        'Vendedor ' . $i;
                    echo '<option value="' . $i . '">' . $i . ' - ' . $nombreCompleto . '</option>';
                }
                ?>
            </select>
            
            <label>Producto (1-5):</label>
            <select name="producto" required>
                <option value="">Seleccione...</option>
                <option value="1">Producto 1</option>
                <option value="2">Producto 2</option>
                <option value="3">Producto 3</option>
                <option value="4">Producto 4</option>
                <option value="5">Producto 5</option>
            </select>
            
            <label>Valor Total de Venta ($):</label>
            <input type="number" step="0.01" name="valor" min="0.01" required>
            
            <button type="submit" name="registrar_venta">Registrar Venta</button>
        </form>
    </div>
</div>

<!-- Listado de Vendedores Registrados -->
<div class="info" style="margin: 20px 0;">
    <h3>📋 Vendedores Registrados</h3>
    <table style="margin-top: 10px;">
        <tr>
            <th>N°</th>
            <th>Nombre Completo</th>
            <th>Estado</th>
        </tr>
        <?php
        for ($i = 1; $i <= 4; $i++) {
            $vendedor = $_SESSION['vendedores'][$i];
            $nombreCompleto = !empty($vendedor['nombre']) ? 
                $vendedor['nombre'] . ' ' . $vendedor['apellido'] : 
                '<em>No registrado</em>';
            $estado = !empty($vendedor['nombre']) ? '✅ Activo' : '⚠️ Pendiente';
            
            echo '<tr>
                    <td>Vendedor ' . $i . '</td>
                    <td>' . $nombreCompleto . '</td>
                    <td>' . $estado . '</td>
                  </tr>';
        }
        ?>
    </table>
</div>

<!-- Tabla de Ventas (Arreglo Bidimensional) -->
<div class="result" style="margin-top: 20px;">
    <h2>📊 Matriz de Ventas del Mes</h2>
    <p style="margin-bottom: 15px;"><strong>Resumen de ventas por Producto y Vendedor</strong></p>
    
    <table style="text-align: center;">
        <tr>
            <th>Producto</th>
            <th>Vendedor 1</th>
            <th>Vendedor 2</th>
            <th>Vendedor 3</th>
            <th>Vendedor 4</th>
            <th style="background: #22543d;">TOTAL PRODUCTO</th>
        </tr>
        
        <?php
        $ventas = $_SESSION['ventas'];
        $totalesPorVendedor = [0, 0, 0, 0];
        $totalGeneral = 0;
        
        // Recorrer productos (filas)
        for ($producto = 0; $producto < 5; $producto++) {
            echo '<tr>';
            echo '<td><strong>Producto ' . ($producto + 1) . '</strong></td>';
            
            $totalProducto = 0;
            
            // Recorrer vendedores (columnas)
            for ($vendedor = 0; $vendedor < 4; $vendedor++) {
                $valor = $ventas[$producto][$vendedor];
                $totalProducto += $valor;
                $totalesPorVendedor[$vendedor] += $valor;
                $totalGeneral += $valor;
                
                $color = $valor > 0 ? '' : 'color: #999;';
                echo '<td style="' . $color . '">$' . number_format($valor, 2) . '</td>';
            }
            
            // Total por producto
            echo '<td style="background: #c6f6d5; font-weight: bold;">$' . number_format($totalProducto, 2) . '</td>';
            echo '</tr>';
        }
        
        // Fila de totales por vendedor
        echo '<tr style="background: #f7fafc; font-weight: bold;">';
        echo '<td style="background: #22543d; color: white;">TOTAL VENDEDOR</td>';
        
        foreach ($totalesPorVendedor as $total) {
            echo '<td style="background: #c6f6d5;">$' . number_format($total, 2) . '</td>';
        }
        
        // Total general
        echo '<td style="background: #667eea; color: white;">$' . number_format($totalGeneral, 2) . '</td>';
        echo '</tr>';
        ?>
    </table>
</div>

<!-- Resumen de Ventas por Vendedor -->
<div class="result" style="margin-top: 20px;">
    <h2>👥 Resumen por Vendedor</h2>
    <table>
        <tr>
            <th>Vendedor</th>
            <th>Nombre</th>
            <th>Total Ventas</th>
            <th>Porcentaje</th>
        </tr>
        <?php
        for ($i = 0; $i < 4; $i++) {
            $vendedor = $_SESSION['vendedores'][$i + 1];
            $nombreCompleto = !empty($vendedor['nombre']) ? 
                $vendedor['nombre'] . ' ' . $vendedor['apellido'] : 
                'No registrado';
            
            $totalVendedor = $totalesPorVendedor[$i];
            $porcentaje = $totalGeneral > 0 ? ($totalVendedor / $totalGeneral) * 100 : 0;
            
            echo '<tr>
                    <td>Vendedor ' . ($i + 1) . '</td>
                    <td>' . $nombreCompleto . '</td>
                    <td><strong>$' . number_format($totalVendedor, 2) . '</strong></td>
                    <td>' . number_format($porcentaje, 2) . '%</td>
                  </tr>';
        }
        ?>
    </table>
</div>

<!-- Resumen de Ventas por Producto -->
<div class="result" style="margin-top: 20px;">
    <h2>📦 Resumen por Producto</h2>
    <table>
        <tr>
            <th>Producto</th>
            <th>Total Ventas</th>
            <th>Porcentaje</th>
            <th>Mejor Vendedor</th>
        </tr>
        <?php
        for ($producto = 0; $producto < 5; $producto++) {
            $totalProducto = 0;
            $mejorVendedor = 0;
            $mejorVenta = 0;
            
            for ($vendedor = 0; $vendedor < 4; $vendedor++) {
                $venta = $ventas[$producto][$vendedor];
                $totalProducto += $venta;
                
                if ($venta > $mejorVenta) {
                    $mejorVenta = $venta;
                    $mejorVendedor = $vendedor + 1;
                }
            }
            
            $porcentaje = $totalGeneral > 0 ? ($totalProducto / $totalGeneral) * 100 : 0;
            $nombreMejorVendedor = $mejorVenta > 0 ? 'Vendedor ' . $mejorVendedor : 'N/A';
            
            echo '<tr>
                    <td>Producto ' . ($producto + 1) . '</td>
                    <td><strong>$' . number_format($totalProducto, 2) . '</strong></td>
                    <td>' . number_format($porcentaje, 2) . '%</td>
                    <td>' . $nombreMejorVendedor . '</td>
                  </tr>';
        }
        ?>
    </table>
</div>

<!-- Estadísticas Generales -->
<div class="info" style="margin-top: 20px;">
    <h3>📈 Estadísticas Generales</h3>
    <?php
    $vendedorConMasVentas = 0;
    $maxVentas = 0;
    
    for ($i = 0; $i < 4; $i++) {
        if ($totalesPorVendedor[$i] > $maxVentas) {
            $maxVentas = $totalesPorVendedor[$i];
            $vendedorConMasVentas = $i + 1;
        }
    }
    
    $promedioVentasPorVendedor = $totalGeneral / 4;
    
    echo '<p><strong>💰 Total de Ventas del Mes:</strong> $' . number_format($totalGeneral, 2) . '</p>';
    echo '<p><strong>🏆 Vendedor con Más Ventas:</strong> Vendedor ' . $vendedorConMasVentas . ' ($' . number_format($maxVentas, 2) . ')</p>';
    echo '<p><strong>📊 Promedio de Ventas por Vendedor:</strong> $' . number_format($promedioVentasPorVendedor, 2) . '</p>';
    ?>
</div>

<!-- Botón para limpiar datos -->
<form method="POST" style="margin-top: 20px;">
    <button type="submit" name="limpiar_datos" 
            style="background: #fc8181; width: auto; padding: 12px 30px;"
            onclick="return confirm('¿Está seguro de limpiar todos los datos?')">
        🗑️ Limpiar Todos los Datos
    </button>
</form>

<?php
Navigation::backToMenu();
echo Navigation::getFooter();
?>