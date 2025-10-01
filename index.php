// ============================================
// index.php - Menú Principal
// ============================================
<?php
require_once 'classes/Navigation.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Problemas PHP</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 40px;
        }
        .menu-item {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 25px;
            border-radius: 10px;
            text-decoration: none;
            transition: transform 0.3s, box-shadow 0.3s;
            text-align: center;
        }
        .menu-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }
        .menu-item h3 {
            font-size: 1.3em;
            margin-bottom: 10px;
        }
        .menu-item p {
            font-size: 0.9em;
            opacity: 0.9;
        }
        .footer {
            background: #2d3748;
            color: white;
            padding: 30px;
            text-align: center;
        }
        .footer h3 {
            margin-bottom: 15px;
            font-size: 1.5em;
        }
        .team-members {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 15px;
        }
        .member {
            background: rgba(255,255,255,0.1);
            padding: 10px 20px;
            border-radius: 20px;
            font-size: 1em;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎯 Sistema de Problemas PHP</h1>
            <p>Seleccione un problema para resolver</p>
        </div>
        
        <div class="menu-grid">
            <a href="problema1.php" class="menu-item">
                <h3>📊 Problema 1</h3>
                <p>Estadísticas de 5 números</p>
            </a>
            
            <a href="problema2.php" class="menu-item">
                <h3>➕ Problema 2</h3>
                <p>Suma del 1 al 1000</p>
            </a>
            
            <a href="problema3.php" class="menu-item">
                <h3>✖️ Problema 3</h3>
                <p>Múltiplos de 4</p>
            </a>
            
            <a href="problema4.php" class="menu-item">
                <h3>🔢 Problema 4</h3>
                <p>Pares e Impares (1-200)</p>
            </a>
            
            <a href="problema5.php" class="menu-item">
                <h3>👥 Problema 5</h3>
                <p>Clasificación por Edades</p>
            </a>
            
            <a href="problema6.php" class="menu-item">
                <h3>🏥 Problema 6</h3>
                <p>Presupuesto Hospital</p>
            </a>
            
            <a href="problema7.php" class="menu-item">
                <h3>📈 Problema 7</h3>
                <p>Estadísticas de Notas</p>
            </a>
            
            <a href="problema8.php" class="menu-item">
                <h3>🌸 Problema 8</h3>
                <p>Estación del Año</p>
            </a>
            
            <a href="problema9.php" class="menu-item">
                <h3>⚡ Problema 9</h3>
                <p>Potencias de un Número</p>
            </a>
            <a href="problema10.php" class="menu-item">
                <h3>⚡ Problema 10</h3>
                <p>Venta de empleados</p>
            </a>
        </div>
        
        <div class="footer">
            <h3>👨‍💻 Equipo de Desarrollo</h3>
            <div class="team-members">
                <div class="member">Joaquin Lu</div>
                <div class="member">María García</div>
            </div>
            <p style="margin-top: 20px; opacity: 0.8;">Ingenieria Web</p>
        </div>
    </div>
</body>
</html>