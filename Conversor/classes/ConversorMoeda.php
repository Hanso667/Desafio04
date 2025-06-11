<?php
class ConversorMoeda
{
    private $valorEmReais = 0;
    private $moedaDestino = '';

    public function setValorEmReais($valor)
    {
        if ($valor > 0) {
            $this->valorEmReais = $valor;
        }
    }

    public function setMoedaDestino($moeda)
    {
        $moeda = strtoupper($moeda);
        if (in_array($moeda, ['USD', 'EUR'])) {
            $this->moedaDestino = $moeda;
        }
    }

    private $apiKey = '4604f37833f54ce092097cf8379448d1';

    private function obterCotacao()
    {
        $url = "https://api.currencyfreaks.com/latest?apikey={$this->apiKey}&symbols={$this->moedaDestino},BRL";

        $response = file_get_contents($url);

        if ($response === false) {
            echo "Erro ao acessar API CurrencyFreaks.";
            return null;
        }

        $data = json_decode($response, true);

        if ($data === null || !isset($data['rates'][$this->moedaDestino]) || !isset($data['rates']['BRL'])) {
            echo "Erro ao processar dados da API.";
            return null;
        }

        // A API base é USD, vamos calcular a cotação BRL -> moedaDestino:

        // Cotação BRL em USD:
        $brlRate = floatval($data['rates']['BRL']);
        // Cotação moedaDestino em USD:
        $destinoRate = floatval($data['rates'][$this->moedaDestino]);

        // Cotação direta BRL -> moedaDestino:
        $cotacao = $destinoRate / $brlRate;

        return $cotacao;
    }



    public function converter()
    {
        $cotacao = $this->obterCotacao();
        if (!$cotacao || !is_numeric($cotacao)) {
            return "Erro ao obter cotação.";
        }
        return $this->valorEmReais * $cotacao;
    }

    public function formatar()
    {
        $valorConvertido = $this->converter();

        if (!is_numeric($valorConvertido)) {
            return $valorConvertido; // mensagem de erro
        }

        switch ($this->moedaDestino) {
            case 'USD':
                return '$' . number_format($valorConvertido, 2, '.', ',');
            case 'EUR':
                return '€' . number_format($valorConvertido, 2, ',', '.');
            default:
                return 'Moeda inválida';
        }
    }

    public function toHtml()
    {
        echo "<h2>Valor em Reais: R$ " . number_format($this->valorEmReais, 2, ',', '.') . "</h2>";
        echo "<h2>Moeda destino: {$this->moedaDestino}</h2>";
        echo "<h2>Conversão: " . $this->formatar() . "</h2>";
    }
}
