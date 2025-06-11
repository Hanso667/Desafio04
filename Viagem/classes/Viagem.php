<?php
class Viagem
{
    private $origem;
    private $destino;
    private $distancia;      // em km
    private $tempoEstimado;  // em horas
    private $tipoVeiculo;
    private $consumo;        // km por litro
    private $precoCombustivel; // R$ por litro

    public function __construct($origem, $destino, $distancia, $tempoEstimado, $tipoVeiculo, $consumo, $precoCombustivel)
    {
        $this->origem = $origem;
        $this->destino = $destino;
        $this->distancia = $distancia;
        $this->tempoEstimado = $tempoEstimado;
        $this->tipoVeiculo = $tipoVeiculo;
        $this->consumo = $consumo;
        $this->precoCombustivel = $precoCombustivel;
    }

    public function velocidadeMedia()
    {
        return $this->tempoEstimado > 0 ? $this->distancia / $this->tempoEstimado : 0;
    }

    public function consumoEstimado()
    {
        return $this->consumo > 0 ? $this->distancia / $this->consumo : 0;
    }

    public function custoViagem()
    {
        return $this->consumoEstimado() * $this->precoCombustivel;
    }

    // getters básicos, se quiser usar depois
    public function getOrigem()
    {
        return $this->origem;
    }
    public function getDestino()
    {
        return $this->destino;
    }
    public function getDistancia()
    {
        return $this->distancia;
    }
    public function getTempoEstimado()
    {
        return $this->tempoEstimado;
    }
    public function getTipoVeiculo()
    {
        return $this->tipoVeiculo;
    }
    public function getConsumo()
    {
        return $this->consumo;
    }
    public function getPrecoCombustivel()
    {
        return $this->precoCombustivel;
    }
}
