<?php
class CalculadoraFinanceira
{
    private $valorCompra;
    private $numParcelas;
    private $taxaJurosMensal; // Ex: 0.02 para 2%

    public function __construct($valorCompra, $numParcelas, $taxaJurosMensal)
    {
        $this->valorCompra = $valorCompra;
        $this->numParcelas = $numParcelas;
        $this->taxaJurosMensal = $taxaJurosMensal;
    }

    // Calcula o valor da parcela com juros compostos
    public function valorParcela()
    {
        // parcela = valor * (1 + juro)^n / n
        $montante = $this->valorCompra * pow(1 + $this->taxaJurosMensal, $this->numParcelas);
        return $montante / $this->numParcelas;
    }

    // Total a pagar (soma das parcelas)
    public function totalPagar()
    {
        return $this->valorParcela() * $this->numParcelas;
    }

    // Juros pagos (total a pagar - valor da compra)
    public function jurosPagos()
    {
        return $this->totalPagar() - $this->valorCompra;
    }

    // Formatação de valores em moeda brasileira (R$)
    public function formatarValor($valor)
    {
        return 'R$ ' . number_format($valor, 2, ',', '.');
    }
}
