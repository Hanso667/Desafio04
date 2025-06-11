<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Calculadora Geométrica</title>
    <script>
        function mostrarCampos() {
            const figura = document.getElementById('figura').value;
            document.querySelectorAll('.medida').forEach(el => el.style.display = 'none');

            if (figura === 'quadrado') {
                document.getElementById('campo-lado').style.display = 'block';
            } else if (figura === 'retangulo') {
                document.getElementById('campo-base').style.display = 'block';
                document.getElementById('campo-altura').style.display = 'block';
            } else if (figura === 'circulo') {
                document.getElementById('campo-raio').style.display = 'block';
            }
        }
        window.onload = mostrarCampos;
    </script>
</head>
<body>

<form method="POST">
    <label>Figura:
        <select name="figura" id="figura" onchange="mostrarCampos()">
            <option value="quadrado">Quadrado</option>
            <option value="retangulo">Retângulo</option>
            <option value="circulo">Círculo</option>
        </select>
    </label><br>

    <div id="campo-lado" class="medida" style="display:none;">
        <label>Lado: <input type="number" step="0.01" name="lado"></label><br>
    </div>

    <div id="campo-base" class="medida" style="display:none;">
        <label>Base: <input type="number" step="0.01" name="base"></label><br>
    </div>

    <div id="campo-altura" class="medida" style="display:none;">
        <label>Altura: <input type="number" step="0.01" name="altura"></label><br>
    </div>

    <div id="campo-raio" class="medida" style="display:none;">
        <label>Raio: <input type="number" step="0.01" name="raio"></label><br>
    </div>

    <button type="submit">Calcular Área</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once './classes/CalculadoraGeometrica.php'; // se estiver separado

    $figura = $_POST['figura'] ?? '';
    $medidas = [];

    // Captura as medidas conforme a figura
    switch ($figura) {
        case 'quadrado':
            $medidas['lado'] = floatval($_POST['lado'] ?? 0);
            break;
        case 'retangulo':
            $medidas['base'] = floatval($_POST['base'] ?? 0);
            $medidas['altura'] = floatval($_POST['altura'] ?? 0);
            break;
        case 'circulo':
            $medidas['raio'] = floatval($_POST['raio'] ?? 0);
            break;
    }

    $calc = new CalculadoraGeometrica($figura, $medidas);
    $area = $calc->areaFormatada();

    echo "<h2>Figura: " . $calc->getFigura() . "</h2>";
    echo "<p>Área: {$area} unidades²</p>";
}
?>

</body>
</html>
