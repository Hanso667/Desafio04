<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="src/css/reset.css">
    <link rel="stylesheet" href="src/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M-é-d-i-a</title>
</head>

<body>

    <div class="Container">

        <form method="POST" class="Formulario">
            <label for="Produto"> Produto: </label>
            <input type="text" name="Produto" id="Produto">

            <label for="Quantidade"> Quantidade: </label>
            <input type="number" name="Quantidade" id="Quantidade">

            <label for="Valor"> preço: </label>
            <input type="text" name="Valor" id="Valor">

            <label for="Cliente"> Tipo de Cliente: </label>
            <input type="text" name="Cliente" id="Cliente" placeholder="premium ou normal">

            <button type="submit"> Submit</button>

        </form>

        <div class="Container-Result">

            <?php
            include_once './classes/Pedido.php';

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $Pedido = new Pedido();

                $Pedido->setProduto($_POST['Produto']);
                $Pedido->setQuantidade($_POST['Quantidade']);
                $Pedido->setPreco($_POST['Valor']);
                $Pedido->setCliente($_POST['Cliente']);

                
                $Pedido->toHtml();
            }
            ?>

        </div>

    </div>

</body>

</html>