<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Planejamento de Viagem</title>
</head>
<body>

<form method="POST">
    <label>Origem: <input type="text" name="origem" required></label><br>
    <label>Destino: <input type="text" name="destino" required></label><br>
    <label>Distância (km): <input type="number" step="0.1" name="distancia" required></label><br>
    <label>Tempo Estimado (horas): <input type="number" step="0.1" name="tempo" required></label><br>
    <label>Tipo de Veículo: <input type="text" name="veiculo" required></label><br>
    <label>Consumo (km/l): <input type="number" step="0.01" name="consumo" required></label><br>
    <label>Preço do Combustível (R$/l): <input type="number" step="0.01" name="preco" required></label><br>
    <button type="submit">Calcular</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once './classes/Viagem.php'; // ou inclua direto o código da classe acima

    $viagem = new Viagem(
        $_POST['origem'],
        $_POST['destino'],
        floatval($_POST['distancia']),
        floatval($_POST['tempo']),
        $_POST['veiculo'],
        floatval($_POST['consumo']),
        floatval($_POST['preco'])
    );

    echo "<h2>Resumo da Viagem</h2>";
    echo "Origem: " . htmlspecialchars($viagem->getOrigem()) . "<br>";
    echo "Destino: " . htmlspecialchars($viagem->getDestino()) . "<br>";
    echo "Distância: " . number_format($viagem->getDistancia(), 2, ',', '.') . " km<br>";
    echo "Tempo Estimado: " . number_format($viagem->getTempoEstimado(), 2, ',', '.') . " h<br>";
    echo "Tipo de Veículo: " . htmlspecialchars($viagem->getTipoVeiculo()) . "<br>";
    echo "Velocidade Média: " . number_format($viagem->velocidadeMedia(), 2, ',', '.') . " km/h<br>";
    echo "Consumo Estimado: " . number_format($viagem->consumoEstimado(), 2, ',', '.') . " litros<br>";
    echo "Custo Estimado: R$ " . number_format($viagem->custoViagem(), 2, ',', '.') . "<br>";
}
?>

</body>
</html>
