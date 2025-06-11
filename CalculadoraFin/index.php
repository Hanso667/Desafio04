<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Calculadora Financeira</title>
</head>
<body>

<form method="POST">
    <label>Valor da Compra (R$): <input type="number" step="0.01" name="valor" required></label><br>
    <label>Número de Parcelas: <input type="number" name="parcelas" min="1" required></label><br>
    <label>Taxa de Juros Mensal (%): <input type="number" step="0.01" name="juros" required></label><br>
    <button type="submit">Calcular</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once './classes/CalculadoraFinanceira.php'; // se estiver separado

    $valor = floatval($_POST['valor']);
    $parcelas = intval($_POST['parcelas']);
    $juros = floatval($_POST['juros']) / 100; // converter porcentagem para decimal

    $calc = new CalculadoraFinanceira($valor, $parcelas, $juros);

    echo "<h2>Resultado</h2>";
    echo "Valor da Parcela: " . $calc->formatarValor($calc->valorParcela()) . "<br>";
    echo "Total a Pagar: " . $calc->formatarValor($calc->totalPagar()) . "<br>";
    echo "Juros Pagos: " . $calc->formatarValor($calc->jurosPagos()) . "<br>";
}
?>

</body>
</html>
