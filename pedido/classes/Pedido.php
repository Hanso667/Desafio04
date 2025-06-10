<?php
class Pedido
{
    private $produto = "";
    private $quantidade = "";
    private $preco = 0.0;
    private $cliente = "";



    public function setProduto($produto)
    {
        $this->produto = $produto;
    }

    public function getProduto()
    {
        return $this->produto;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setPreco($preco)
    {
        if ($preco > 0) {
            $this->preco = $preco;
        } else {
            echo "<script>";
            echo `alert("Preço tem um valor invalido")`;
            echo "</script>";
        }
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setCliente($cliente)
    {
        if ($cliente == "normal" && $cliente == "premium") {
        } else {
            echo "<script>";
            echo `alert("Cliente tem um valor invalido")`;
            echo "</script>";
        }
    }

    public function getCliente()
    {
        return $this->cliente;
    }


    public function getTotalBruto()
    {
        return $this->getPreco() * $this->getQuantidade();
    }

    public function getDesconto($tipo)
    {
        if($this->getCliente() == "premium"){
            $porcento = 10;
        }else{
            $porcento = 5;
        }
            if($tipo == "%"){
                return `$porcento . %`;
            } else if ($tipo == "R$"){
                return (float)$this->getTotalBruto()/100*$porcento;
            }
        
    }

     public function getImposto($tipo)
    {
            if($tipo == "%"){
                return `8%`;
            } else if ($tipo == "R$"){
                return (float)$this->getTotalBruto()/100*8;
            }
        
    }

    public function getTotal(){
        return $this->getTotalBruto() - $this->getDesconto('R$') + $this->getImposto('R$');
    }

    public function toHtml()
    {
        echo "<h2> Produto: " . $this->getProduto() . "</h2>";
        echo "<h2> Quantidade: " . $this->getQuantidade() . "</h2>";
        echo "<h1> Total Bruto: " . $this->getTotalBruto() . "</h1>";
        echo "<h1> Desconto (%): " . $this->getDesconto("%") . "</h1>";
        echo "<h1> Desconto (R$): " . $this->getDesconto("R%") . "</h1>";
        echo "<h1> Imposto (%): " . $this->getImposto("%") . "</h1>";
        echo "<h1> Desconto (R%): " . $this->getImposto("R%") . "</h1>";
        echo "<h1> Total: " . $this->getTotal() . "</h1>";
    }
}
