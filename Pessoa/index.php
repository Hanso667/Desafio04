<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Calculadora de IMC</title>
</head>
<body>

<form method="POST">
    <label>Nome: <input type="text" name="nome" required></label><br>
    <label>Peso (kg): <input type="number" step="0.1" name="peso" required></label><br>
    <label>Altura (m): <input type="number" step="0.01" name="altura" required></label><br>
    <button type="submit">Calcular IMC</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once './classes/Pessoa.php'; // se estiver separado

    $nome = $_POST['nome'];
    $peso = floatval($_POST['peso']);
    $altura = floatval($_POST['altura']);

    $pessoa = new Pessoa($nome, $peso, $altura);

    $imc = $pessoa->calcularIMC();
    $classificacao = $pessoa->classificarIMC();

    echo "<h2>Resultado para " . htmlspecialchars($pessoa->getNome()) . "</h2>";
    echo "IMC: " . number_format($imc, 2, ',', '.') . "<br>";
    echo "Classificação: " . $classificacao . "<br>";
}
?>

</body>
</html>
