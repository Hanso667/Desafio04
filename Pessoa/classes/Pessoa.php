<?php
class Pessoa
{
    private $nome;
    private $peso;   // em kg
    private $altura; // em metros

    public function __construct($nome, $peso, $altura)
    {
        $this->nome = $nome;
        $this->peso = $peso;
        $this->altura = $altura;
    }

    // Calcula o IMC = peso / (altura * altura)
    public function calcularIMC()
    {
        if ($this->altura <= 0) {
            return 0;
        }
        return $this->peso / ($this->altura ** 2);
    }

    // Classifica o IMC de acordo com os padrões comuns
    public function classificarIMC()
    {
        $imc = $this->calcularIMC();

        if ($imc == 0) {
            return "Altura inválida";
        } elseif ($imc < 18.5) {
            return "Abaixo do peso";
        } elseif ($imc < 25) {
            return "Peso normal";
        } elseif ($imc < 30) {
            return "Sobrepeso";
        } else {
            return "Obesidade";
        }
    }

    // Getters simples, caso queira usar
    public function getNome() { return $this->nome; }
    public function getPeso() { return $this->peso; }
    public function getAltura() { return $this->altura; }
}

