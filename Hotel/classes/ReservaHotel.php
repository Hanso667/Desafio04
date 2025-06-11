<?php
class ReservaHotel
{
    private $nomeHospede;
    private $numNoites;
    private $tipoQuarto;

    private $precos = [
        'simples' => 120,
        'luxo' => 200,
        'suite' => 350
    ];

    public function __construct($nomeHospede, $numNoites, $tipoQuarto)
    {
        $this->nomeHospede = $nomeHospede;
        $this->numNoites = $numNoites;
        $this->tipoQuarto = strtolower($tipoQuarto);
    }

    public function getPrecoPorNoite()
    {
        return $this->precos[$this->tipoQuarto] ?? 0;
    }

    public function calcularTotal()
    {
        $total = $this->getPrecoPorNoite() * $this->numNoites;

        // desconto para estadias acima de 5 noites (exemplo: 10%)
        if ($this->numNoites > 5) {
            $total *= 0.9; // 10% de desconto
        }

        return $total;
    }

    public function mensagemBoasVindas()
    {
        return "Bem-vindo(a), " . htmlspecialchars($this->nomeHospede) . "! Sua reserva para o quarto " . ucfirst($this->tipoQuarto) .
            " por " . $this->numNoites . " noites foi realizada.";
    }

    public function valorFormatado($valor)
    {
        return "R$ " . number_format($valor, 2, ',', '.');
    }
}
