# 🎯 Sistema de Problemas PHP - Proyecto Académico

## 📋 Información del Proyecto

**Universidad:** Universidad Tecnológica de Panamá (UTP)  
**Curso:** Ingenieria Web 
**Fecha de Realización:** 2 de Octubre 2025  

---

## 👥 Integrantes del Equipo

| Nombre Completo | Correo Electrónico | Rol |
|----------------|-------------------|-----|
| Joaquin Lu Zheng | joaquin.lu@utp.ac.pa | Desarrollador Frontend |
| Manuel Guillen | manuel.guillen1@utp.ac.pa | Desarrollador Frontend |

---

## 📖 Introducción

Este proyecto consiste en el desarrollo de una aplicación web completa en PHP que resuelve 10 problemas de programación diferentes, enfocados en cálculos matemáticos, estadísticas, validación de datos y procesamiento de información empresarial. 

El sistema fue diseñado siguiendo los estándares de codificación **PSR-1** (Basic Coding Standard) y aplicando principios de **Programación Orientada a Objetos (POO)**, con el objetivo de crear un código limpio, mantenible y escalable.

La aplicación incluye un menú principal de navegación intuitivo que permite al usuario acceder a cada uno de los problemas de forma independiente, con la posibilidad de regresar al menú principal en cualquier momento.

---

## 💻 Tecnologías Utilizadas

### Lenguajes y Frameworks
- **PHP** - Lenguaje de programación del lado del servidor
- **HTML5** - Estructura y contenido de las páginas web
- **CSS3** - Estilos y diseño responsivo
- **JavaScript** - Interactividad 

### Estándares y Metodologías
- **PSR-1** - Basic Coding Standard para PHP
- **POO (Programación Orientada a Objetos)** - Arquitectura del sistema
- **MVC Pattern** - Separación de lógica de negocio y presentación
- **Sessions** - Manejo de estado y persistencia de datos

### Herramientas de Desarrollo
- **Git** - Control de versiones
- **GitHub** - Repositorio remoto
- **XAMPP/WAMP** - Servidor local de desarrollo
- **Visual Studio Code** - Editor de código

---

## 🏗️ Arquitectura del Sistema

### Estructura de Directorios

```
Taller_JM/
│
├── index.php                 # Menú principal
├── problema1.php             # Estadísticas de 5 números
├── problema2.php             # Suma del 1 al 1000
├── problema3.php             # Múltiplos de 4
├── problema4.php             # Pares e Impares
├── problema5.php             # Clasificación por edades
├── problema6.php             # Presupuesto hospital
├── problema7.php             # Calculadora estadística
├── problema8.php             # Estación del año
├── problema9.php             # Potencias de un número
├── problema10.php            # Sistema de ventas
│
└── classes/                  # Clases con métodos estáticos
    ├── Navigation.php        # Navegación y layout
    ├── Statistics.php        # Cálculos estadísticos
    ├── MathOperations.php    # Operaciones matemáticas
    └── SeasonCalculator.php  # Cálculo de estaciones
```

---

## 🔧 Programación Orientada a Objetos (POO)

### Clases Implementadas

#### 1. **Navigation.php**
Clase utilitaria para manejo de navegación y generación de layout HTML.

```php
class Navigation
{
    public static function backToMenu($url = 'index.php')
    public static function getHeader($title)
    public static function getFooter()
}
```

**Métodos Estáticos Utilizados:**
- `backToMenu()` - Genera enlace de regreso al menú principal
- `getHeader()` - Genera encabezado HTML con estilos
- `getFooter()` - Genera pie de página HTML

#### 2. **Statistics.php**
Clase para cálculos estadísticos avanzados.

```php
class Statistics
{
    public static function calculateMean($numbers)
    public static function calculateStandardDeviation($numbers)
    public static function getMin($numbers)
    public static function getMax($numbers)
    public static function classifyByAge($age)
}
```

**Funciones Matemáticas Implementadas:**

- **`calculateMean()`** - Calcula la media aritmética
  ```php
  return array_sum($numbers) / count($numbers);
  ```

- **`calculateStandardDeviation()`** - Calcula la desviación estándar
  ```php
  $variance = array_sum(array_map(function($x) use ($mean) {
      return pow($x - $mean, 2);
  }, $numbers)) / count($numbers);
  
  return sqrt($variance);  // Función sqrt() para raíz cuadrada
  ```

- **Funciones PHP utilizadas:**
  - `sqrt()` - Raíz cuadrada
  - `pow()` - Potenciación
  - `array_sum()` - Suma de elementos de un array
  - `min()` y `max()` - Valores mínimo y máximo

#### 3. **MathOperations.php**
Clase para operaciones matemáticas generales.

```php
class MathOperations
{
    public static function sumRange($start, $end)
    public static function getMultiples($base, $count)
    public static function sumEvenOdd($start, $end)
    public static function getPowers($base, $count)
}
```

**Funciones Matemáticas Especiales:**

- **Fórmula de Gauss** para suma de rangos:
  ```php
  // Suma de 1 a n: n(n+1)/2
  return ($end * ($end + 1)) / 2;
  ```

- **Potenciación** con `pow()`:
  ```php
  $resultado = pow($base, $exponente);  // base^exponente
  ```

#### 4. **SeasonCalculator.php**
Clase para determinación de estaciones del año.

```php
class SeasonCalculator
{
    public static function getSeason($day, $month)
}
```

---

## 🛡️ Validación y Sanitización de Datos

### Funciones de Validación Utilizadas

#### 1. **Validación de Entrada de Formularios**

```php
// Validación de números enteros
$numero = intval($_POST['numero']);

// Validación de números decimales
$valor = floatval($_POST['valor']);

// Validación de strings
$nombre = trim($_POST['nombre']);
```

#### 2. **Sanitización con htmlspecialchars()**

Previene ataques XSS (Cross-Site Scripting):

```php
echo htmlspecialchars($nombre);  // Escapa caracteres HTML especiales
echo htmlspecialchars($url);     // Protege URLs
```

#### 3. **Validación de Fechas**

```php
// checkdate() valida si una fecha es válida
if (checkdate($month, $day, $year)) {
    // Fecha válida
}
```

#### 4. **Validación de Rangos**

```php
// Validar que un número esté en un rango específico
if ($edad >= 0 && $edad <= 120) {
    // Edad válida
}

if ($vendedor >= 1 && $vendedor <= 4) {
    // Vendedor válido
}
```

#### 5. **Validación de Arrays**

```php
// isset() - Verifica si una variable está definida
if (isset($_POST['nombre'])) {
    // Variable existe
}

// empty() - Verifica si una variable está vacía
if (!empty($nombre)) {
    // Variable tiene contenido
}

// count() - Cuenta elementos de un array
if (count($notas) > 0) {
    // Array tiene elementos
}
```

#### 6. **Validación de Métodos HTTP**

```php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Procesar solo peticiones POST
}
```

---

## 📊 Descripción de Problemas

### Problema 1: Estadísticas de 5 Números
Calcula la media, desviación estándar, mínimo y máximo de 5 números positivos.

**Tecnologías:** POO, Métodos estáticos, Funciones matemáticas (`sqrt`, `pow`)

---

### Problema 2: Suma del 1 al 1000
Calcula la suma de todos los números del 1 al 1000 usando la fórmula de Gauss.

**Tecnologías:** Algoritmos optimizados, Fórmulas matemáticas

---

### Problema 3: Múltiplos de 4
Genera los N primeros múltiplos de 4 de forma dinámica.

**Tecnologías:** Ciclos `for`, Arrays dinámicos

---

### Problema 4: Suma de Pares e Impares
Calcula independientemente la suma de números pares e impares del 1 al 200.

**Tecnologías:** Operador módulo (`%`), Condicionales

---

### Problema 5: Clasificación por Edades
Clasifica 5 personas en categorías: Niño, Adolescente, Adulto, Adulto Mayor. Genera estadísticas.

**Tecnologías:** Estructuras condicionales, Análisis de datos

---

### Problema 6: Presupuesto Hospital
Distribuye el presupuesto anual de un hospital entre 3 áreas según el número de pacientes.

**Tecnologías:** Cálculo de porcentajes, Análisis proporcional

---

### Problema 7: Calculadora de Datos Estadísticos
Solicita N notas y calcula promedio, desviación estándar, nota mínima y máxima usando `foreach`.

**Tecnologías:** `foreach`, Formularios dinámicos, Estadística descriptiva

---

### Problema 8: Estación del Año
Determina la estación del año según una fecha ingresada.

**Tecnologías:** Validación de fechas (`checkdate`), Lógica condicional compleja

---

### Problema 9: Potencias de un Número
Genera las 15 primeras potencias de un número del 1 al 9.

**Tecnologías:** Función `pow()`, Tablas dinámicas

---

### Problema 10: Sistema de Ventas
Sistema completo con arreglo bidimensional para gestionar ventas de 4 vendedores y 5 productos.

**Tecnologías:** Arrays bidimensionales, Sessions, CRUD completo, Análisis de ventas

---

## 🚀 Instalación y Uso

### Requisitos Previos
- PHP 7.4 o superior
- Servidor web (Apache/Nginx)
- XAMPP, WAMP o MAMP (recomendado para desarrollo local)

### Pasos de Instalación

1. **Clonar el repositorio**
   ```bash
   git clone https://github.com/usuario/sistema-problemas-php.git
   ```

2. **Mover archivos al servidor**
   ```bash
   # Para XAMPP
   cp -r sistema-problemas-php /xampp/htdocs/
   
   # Para WAMP
   cp -r sistema-problemas-php /wamp64/www/
   ```

3. **Iniciar el servidor**
   - Abrir XAMPP/WAMP
   - Iniciar Apache

4. **Acceder a la aplicación**
   ```
   http://localhost/sistema-problemas-php/index.php
   ```

---

## 📝 Estándares de Codificación

### PSR-1: Basic Coding Standard

El proyecto sigue estrictamente el estándar PSR-1:

- ✅ Archivos PHP usan solo `<?php` tags
- ✅ Archivos PHP usan codificación UTF-8 sin BOM
- ✅ Nombres de clases en `StudlyCaps` (PascalCase)
- ✅ Nombres de métodos en `camelCase`
- ✅ Constantes de clase en `UPPER_CASE` con guiones bajos

**Ejemplo:**
```php
<?php

class MathOperations  // StudlyCaps
{
    public static function calculateSum($numbers)  // camelCase
    {
        // Código aquí
    }
}
```

---

## 🧪 Funciones PHP Clave Utilizadas

### Funciones Matemáticas
| Función | Descripción | Uso |
|---------|-------------|-----|
| `sqrt()` | Raíz cuadrada | Cálculo de desviación estándar |
| `pow()` | Potenciación | Cálculo de potencias y varianza |
| `abs()` | Valor absoluto | Operaciones numéricas |
| `round()` | Redondeo | Formateo de números |

### Funciones de Arrays
| Función | Descripción | Uso |
|---------|-------------|-----|
| `array_sum()` | Suma de elementos | Cálculo de totales |
| `array_fill()` | Llenar array | Inicialización de matrices |
| `count()` | Contar elementos | Validaciones |
| `min()` / `max()` | Valores extremos | Estadísticas |

### Funciones de Validación
| Función | Descripción | Uso |
|---------|-------------|-----|
| `intval()` | Convertir a entero | Sanitización |
| `floatval()` | Convertir a decimal | Sanitización |
| `trim()` | Eliminar espacios | Limpieza de strings |
| `htmlspecialchars()` | Escapar HTML | Prevención XSS |
| `isset()` | Verificar existencia | Validación |
| `empty()` | Verificar vacío | Validación |
| `checkdate()` | Validar fecha | Validación de fechas |

