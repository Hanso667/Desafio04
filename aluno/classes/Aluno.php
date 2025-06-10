<?php
class Aluno
{
    private $nome = "";
    private $disciplina = "";
    private $nota1 = 0;
    private $nota2 = 0;
    private $nota3 = 0;


    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setDisciplina($disciplina){
        $this->disciplina = $disciplina;
    }

    public function getDisciplina(){
        return $this->disciplina;
    }

    public function setNota1($nota)
    {
        if ($this->nota1 >= 0 || $this->nota1 <= 10) {
            $this->nota1 = $nota;
        } else {
            echo "<script>";
            echo `alert("nota1 tem um valor invalido")`;
            echo "</script>";
        }
    }

    public function setNota2($nota)
    {
        if ($this->nota2 >= 0 || $this->nota2 <= 10) {
            $this->nota2 = $nota;
        } else {
            echo "<script>";
            echo `alert("nota2 tem um valor invalido")`;
            echo "</script>";
        }
    }

    public function setNota3($nota)
    {
        if ($this->nota3 >= 0 || $this->nota3 <= 10) {
            $this->nota3 = $nota;
        } else {
            echo "<script>";
            echo `alert("nota3 tem um valor invalido")`;
            echo "</script>";
        }
    }

    public function getMedia()
    {
        $media = ($this->nota1 + $this->nota2 + $this->nota3) / 3;
        return $media;
    }

    public function getStatus()
    {
        if ($this->getMedia() >= 7) {
            return "Aprovado";
        } else if ($this->getMedia() < 7 || $this->getMedia() >= 5) {
            return "Recuperação";
        } else {
            return "reprovado";
        }
    }

    public function toHtml()
    {
        echo "<h2> Nome: " . $this->getNome() . "</h2>";
        echo "<h2> Disciplina: " . $this->getDisciplina() . "</h2>";
        echo "<h1> Nota: " . $this->getMedia() . "</h1>";
        echo "<h1> Status: " . $this->getStatus() . "</h1>";
    }
}
