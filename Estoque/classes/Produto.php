<?php
class Produto
{
    private $nome = "";
    private $quantidade = 0;
    private $valorUnitario = 0.0;

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setQuantidade($quantidade)
    {
        if (is_numeric($quantidade) && $quantidade >= 0) {
            $this->quantidade = $quantidade;
        }
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setValorUnitario($valor)
    {
        if (is_numeric($valor) && $valor > 0) {
            $this->valorUnitario = $valor;
        }
    }

    public function getValorUnitario()
    {
        return $this->valorUnitario;
    }

    public function entradaEstoque($quantidade)
    {
        if (is_numeric($quantidade) && $quantidade > 0) {
            $this->quantidade += $quantidade;
        }
    }

    public function saidaEstoque($quantidade)
    {
        if (is_numeric($quantidade) && $quantidade > 0 && $quantidade <= $this->quantidade) {
            $this->quantidade -= $quantidade;
        } else {
            echo "<script>alert('Quantidade de saída inválida');</script>";
        }
    }

    public function getValorTotalEstoque()
    {
        return $this->quantidade * $this->valorUnitario;
    }

    public function toHtml()
    {
        echo "<h2>Produto: {$this->getNome()}</h2>";
        echo "<p>Quantidade em estoque: {$this->getQuantidade()}</p>";
        echo "<p>Valor unitário: R$ " . number_format($this->getValorUnitario(), 2, ',', '.') . "</p>";
        echo "<p><strong>Valor total em estoque: R$ " . number_format($this->getValorTotalEstoque(), 2, ',', '.') . "</strong></p>";
    }
}
?>