<?php
class CalculadoraGeometrica
{
    private $figura;
    private $medidas;

    public function __construct($figura, $medidas)
    {
        $this->figura = strtolower($figura);
        $this->medidas = $medidas; // array associativo com as medidas necessárias
    }

    public function calcularArea()
    {
        switch ($this->figura) {
            case 'quadrado':
                // lado²
                $lado = $this->medidas['lado'] ?? 0;
                return $lado * $lado;

            case 'retangulo':
                // base * altura
                $base = $this->medidas['base'] ?? 0;
                $altura = $this->medidas['altura'] ?? 0;
                return $base * $altura;

            case 'circulo':
                // π * raio²
                $raio = $this->medidas['raio'] ?? 0;
                return pi() * pow($raio, 2);

            default:
                return 0;
        }
    }

    public function getFigura()
    {
        return ucfirst($this->figura);
    }

    public function areaFormatada()
    {
        return number_format($this->calcularArea(), 2, ',', '.');
    }
}
