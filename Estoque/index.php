<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Controle de Estoque</title>
    <link rel="stylesheet" href="src/css/style.css">
</head>
<body>
    <div class="container">
        <form method="POST" class="formulario">
            <h2>Cadastro de Produto</h2>

            <label for="nome">Nome do Produto:</label>
            <input type="text" name="nome" id="nome" required>

            <label for="quantidade">Quantidade em Estoque:</label>
            <input type="number" name="quantidade" id="quantidade" min="0" required>

            <label for="valor">Valor Unitário (R$):</label>
            <input type="text" name="valor" id="valor" placeholder="Ex: 12.50" required>

            <label for="movimentacao">Tipo de Movimentação:</label>
            <select name="movimentacao" id="movimentacao">
                <option value="nenhum">Nenhum</option>
                <option value="entrada">Entrada de Estoque</option>
                <option value="saida">Saída de Estoque</option>
            </select>

            <label for="quantidadeMovimento">Quantidade da Movimentação:</label>
            <input type="number" name="quantidadeMovimento" id="quantidadeMovimento" min="0">

            <button type="submit">Enviar</button>
        </form>

        <div class="resultado">
            <?php
            include_once './classes/Produto.php';

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nome = htmlspecialchars($_POST['nome']);
                $quantidade = (int) $_POST['quantidade'];
                $valor = (float) str_replace(',', '.', $_POST['valor']);
                $movimentacao = $_POST['movimentacao'];
                $quantidadeMovimento = (int) $_POST['quantidadeMovimento'];

                $produto = new Produto();
                $produto->setNome($nome);
                $produto->setQuantidade($quantidade);
                $produto->setValorUnitario($valor);

                if ($movimentacao === 'entrada') {
                    $produto->entradaEstoque($quantidadeMovimento);
                } elseif ($movimentacao === 'saida') {
                    $produto->saidaEstoque($quantidadeMovimento);
                }

                $produto->toHtml();
            }
            ?>
        </div>
    </div>
</body>
</html>
