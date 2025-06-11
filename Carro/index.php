<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="src/css/reset.css">
    <link rel="stylesheet" href="src/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veículo - Autonomia</title>
</head>

<body>

    <div class="Container">

        <form method="POST" class="Formulario">
            <label for="modelo">Modelo:</label>
            <input type="text" name="modelo" id="modelo" required>

            <label for="combustivel">Combustível:</label>
            <input type="text" name="combustivel" id="combustivel" placeholder="etanol ou gasolina" required>

            <label for="tanque">Tanque (litros):</label>
            <input type="number" name="tanque" id="tanque" min="1" step="0.1" required>

            <label for="consumo">Consumo (km/l):</label>
            <input type="number" name="consumo" id="consumo" min="1" step="0.1" required>

            <label for="km">Quilometragem atual:</label>
            <input type="number" name="km" id="km" min="0" required>

            <label for="preco">Preço do combustível (R$):</label>
            <input type="text" name="preco" id="preco" placeholder="Ex: 5.89" required>

            <button type="submit">Calcular</button>
        </form>

        <div class="Container-Result">

            <?php
            include_once './classes/Veiculo.php';

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $modelo = htmlspecialchars($_POST['modelo']);
                $combustivel = strtolower(trim($_POST['combustivel']));
                $tanque = (float) $_POST['tanque'];
                $consumo = (float) $_POST['consumo'];
                $km = (int) $_POST['km'];
                $preco = (float) str_replace(',', '.', $_POST['preco']);

                $veiculo = new Veiculo();
                $veiculo->setModelo($modelo);
                $veiculo->setCombustivel($combustivel);
                $veiculo->setTanque($tanque);
                $veiculo->setConsumo($consumo);
                $veiculo->setKilometragem($km);

                $veiculo->toHtml($preco);
            }
            ?>

        </div>

    </div>

</body>

</html>
