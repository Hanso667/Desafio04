<?php
class Veiculo
{
    private $modelo = "";
    private $combustivel = "";
    private $consumo = 0;
    private $tanque = 0;
    private $kilometragem = 0;

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function setCombustivel($combustivel)
    {
        $combustivel = strtolower($combustivel);
        if ($combustivel === "etanol" || $combustivel === "gasolina") {
            $this->combustivel = $combustivel;
        } else {
            echo "<script>alert('Tipo de combustível inválido');</script>";
        }
    }

    public function getCombustivel()
    {
        return $this->combustivel;
    }

    public function setConsumo($consumo)
    {
        if (is_numeric($consumo) && $consumo > 0) {
            $this->consumo = $consumo;
        } else {
            echo "<script>alert('Consumo inválido');</script>";
        }
    }

    public function getConsumo()
    {
        return $this->consumo;
    }

    public function setTanque($tanque)
    {
        if (is_numeric($tanque) && $tanque > 0) {
            $this->tanque = $tanque;
        } else {
            echo "<script>alert('Capacidade do tanque inválida');</script>";
        }
    }

    public function getTanque()
    {
        return $this->tanque;
    }

    public function setKilometragem($km)
    {
        if (is_numeric($km) && $km >= 0) {
            $this->kilometragem = $km;
        } else {
            echo "<script>alert('Quilometragem inválida');</script>";
        }
    }

    public function getKilometragem()
    {
        return $this->kilometragem;
    }
    public function getAutonomia()
    {
        return $this->consumo * $this->tanque;
    }

    public function getCustoPorKm($precoCombustivel)
    {
        if ($this->consumo > 0) {
            return $precoCombustivel / $this->consumo;
        }
        return 0;
    }

    public function precisaRevisao()
    {
        return $this->kilometragem >= 10000;
    }

    public function toHtml($precoCombustivel)
    {
        echo "<h2>Modelo: " . $this->getModelo() . "</h2>";
        echo "<p>Combustível: " . ucfirst($this->getCombustivel()) . "</p>";
        echo "<p>Tanque: " . $this->getTanque() . " litros</p>";
        echo "<p>Consumo: " . $this->getConsumo() . " km/l</p>";
        echo "<p>Autonomia: " . $this->getAutonomia() . " km</p>";
        echo "<p>Custo por km: R$ " . number_format($this->getCustoPorKm($precoCombustivel), 2, ',', '.') . "</p>";
        echo "<p>Quilometragem atual: " . $this->getKilometragem() . " km</p>";
        echo "<p><strong>Revisão: " . ($this->precisaRevisao() ? "Sim" : "Não") . "</strong></p>";
    }
}
