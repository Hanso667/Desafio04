<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Reserva de Hotel</title>
</head>
<body>

<form method="POST">
    <label>Nome do Hóspede: <input type="text" name="nome" required></label><br>
    <label>Número de Noites: <input type="number" name="noites" min="1" required></label><br>
    <label>Tipo de Quarto:
        <select name="quarto" required>
            <option value="simples">Simples (R$120)</option>
            <option value="luxo">Luxo (R$200)</option>
            <option value="suite">Suíte (R$350)</option>
        </select>
    </label><br>
    <button type="submit">Reservar</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once './classes/ReservaHotel.php'; // se a classe estiver em arquivo separado

    $nome = $_POST['nome'];
    $noites = intval($_POST['noites']);
    $quarto = $_POST['quarto'];

    $reserva = new ReservaHotel($nome, $noites, $quarto);

    echo "<h2>" . $reserva->mensagemBoasVindas() . "</h2>";
    echo "<p>Valor total da hospedagem: " . $reserva->valorFormatado($reserva->calcularTotal()) . "</p>";
    if ($noites > 5) {
        echo "<p><em>Você recebeu 10% de desconto por estadia longa!</em></p>";
    }
}
?>

</body>
</html>
