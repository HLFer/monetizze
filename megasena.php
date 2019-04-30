<?php
class MegaSena{
    //Questão 1)
    //Classe MegaSena com 4 atributos privados
    private $qtd_dezenas, $resultado, $total_jogos, $jogos;

    //Questão 3)
    //Método construtor recebendo 2 parametros
    function __construct($qtd_dezenas, $total_jogos) {
        $this->setQntDezenas($qtd_dezenas);
        $this->setTotalJogos($total_jogos);
    }
    // Início - Getters & Setters
    public function getQntDezenas() { 
        return $this->qtd_dezenas; 
    }
    public function setQntDezenas($qtd_dezenas) {
        $this->qtd_dezenas = $qtd_dezenas; 
    }
    public function getResultado() { 
        return $this->resultado; 
    }
    public function setResultado($resultado) { 
        $this->resultado = $resultado; 
    }
    public function getTotalJogos() { 
        return $this->total_jogos; 
    }
    public function setTotalJogos($total_jogos) { 
        $this->total_jogos = $total_jogos; 
    }
    public function getJogos($i = null) { 
        return (is_null($i)) ? $this->jogos : $this->jogos[$i]; 
    }
    public function setJogos($jogos) { 
        $this->jogos = $jogos; 
    }
    //Fim - Getters & Setters
    
    
    // Metodos
    private function gerarDezenas($qtd_dezenas) {
        $arr = array();
        for ($i=0; $i<$qtd_dezenas; $i++) {
            $arr[] = $this->getRandomInt(1,60,$arr);
        }
        sort($arr,SORT_NUMERIC);
        return $arr;
    }
    private function getRandomInt($min, $max, $except) {
        $rand;
        do {
            $rand = rand($min, $max);
        } while (in_array($rand, $except));
        return $rand;
    }
    private function imprimirArray($arr) {
        if (is_array($arr)) {
            $str = "[";
            for ($i=0; $i<count($arr);$i++) $str .= $arr[$i] .",";
            return substr($str, 0,-1) ."]";
        } else {
            return "Não é um array";
        }
    }
    private function verificarAcertos($resultado, $jogo) {
        $acertos = 0;
        if (!is_array($resultado) || !is_array($jogo)) return $acertos;
        $size = count($jogo);
        for ($i=0; $i<$size; $i++) {
            if (in_array($jogo[$i], $resultado)) $acertos++;
        }
        return $acertos;
    }
    public function gerarJogos() {
        $arrJogos = array();
        for ($i=0; $i<$this->getTotalJogos(); $i++) {
            $arrJogos[] = $this->gerarDezenas($this->getQntDezenas());
        }
        $this->setJogos($arrJogos);
    }
    public function sortear() {
        $this->setResultado($this->gerarDezenas(6));
    }
    public function resposta() {
        $html = "
        <div align='center'>
            <table>
                <thead>
                    <tr>
                        <th>Resultado do Sorteio:</th>
                        <th>". $this->imprimirArray($this->resultado) ."</th>
                    </tr>
                    <tr>
                        <th>Jogos</th>
                        <th>Acertos</th>
                    </tr>
                </thead>
            <tbody>
        </div>";
        for ($i=0; $i<$this->getTotalJogos(); $i++) {
            $html .= "
                <tr>
                    <td>". $this->imprimirArray($this->getJogos($i)) ."</td>
                    <td>". $this->verificarAcertos($this->resultado, $this->getJogos($i)) ."</td>
                </tr>";
        }
        $html .= "</tbody></table>";
		return $html;
    }
}
