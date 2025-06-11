<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Conversor de Moeda</title>
    <link rel="stylesheet" href="src/css/style.css">
</head>

<body>
    <div class="container">
        <form method="POST" class="formulario">
            <h2>Conversão de Real para Moeda Estrangeira</h2>

            <label for="valor">Valor em Reais (R$):</label>
            <input type="text" name="valor" id="valor" placeholder="Ex: 100.00" required>

            <label for="moeda">Converter para:</label>
            <select name="moeda" id="moeda" required>
                <option value="USD">Dólar (USD)</option>
                <option value="EUR">Euro (EUR)</option>
            </select>

            <button type="submit">Converter</button>
        </form>

        <div class="resultado">
            <?php
            include_once './classes/ConversorMoeda.php';

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $valor = (float) str_replace(',', '.', $_POST['valor']);
                $moeda = $_POST['moeda'];

                $conversor = new ConversorMoeda();
                $conversor->setValorEmReais($valor);
                $conversor->setMoedaDestino($moeda);

                $conversor->toHtml();
            }
            ?>
        </div>
    </div>

</body>

</html>