<?php 
class Evento {
    // Atributos da classe
    private $local;
    private $data;
    private $hora;
    private $previsaoDePublico;
    private $preco;
    private $descricao;

    // Construtor da classe
    public function __construct($local, $data, $hora, $previsaoDePublico, $preco, $descricao) {
        $this->local = $local;
        $this->data = $data;
        $this->hora = $hora;
        $this->previsaoDePublico = $previsaoDePublico;
        $this->preco = $preco;
        $this->descricao = $descricao;
    }

    // Métodos de acesso (getters e setters) para os atributos
    public function getLocal() {
        return $this->local;
    }

    public function setLocal($local) {
        $this->local = $local;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getHora() {
        return $this->hora;
    }

    //SETTS 
    public function setHora($hora) {
        $this->hora = $hora;
    }

    public function getPrevisaoDePublico() {
        return $this->previsaoDePublico;
    }

    public function setPrevisaoDePublico($previsaoDePublico) {
        $this->previsaoDePublico = $previsaoDePublico;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
}

class Show extends Evento{
     // Atributos da classe
     private $cantor;
     private $tipoDeMusica;
 
     // Construtor da classe
     public function __construct($local, $data, $hora, $previsaoDePublico, $preco, $descricao, $cantor, $tipoDeMusica) {
        $this->local = $local;
        $this->data = $data;
        $this->hora = $hora;
        $this->previsaoDePublico = $previsaoDePublico;
        $this->preco = $preco;
        $this->descricao = $descricao;
        $this->cantor = $cantor;
        $this->tipoDeMusica = $tipoDeMusica;
    }
 
    // Métodos de acesso (getters e setters) para os atributos
    public function getCantor() {
        return $this->cantor;
    }
 
    public function setCantor($cantor) {
        $this->cantor = $cantor;
    }
 
    public function getTipoDeMusica() {
        return $this->tipoDeMusica;
    }
 
    public function setTipoDeMusica($tipoDeMusica) {
        $this->tipoDeMusica = $tipoDeMusica;
    }

    public function ExibeUmShow($dadoFiltroShow){
        echo "Show: \n";
        if ($this->local==$dadoFiltroShow || $this->cantor==$dadoFiltroShow || $this->tipoDeMusica==$dadoFiltroShow){
            foreach ($this as $key => $value) {
                echo "Local: " . $this->local . "\n";
                echo "Data: " . $this->data . "\n";
                echo "Hora: " . $this->hora . "\n";
                echo "Previsão de Público: " . $this->previsaoDePublico . "\n";
                echo "Preço: " . $this->preco . "\n";
                echo "Descrição: " . $this->descricao . "\n";
                echo "Cantor: " . $this->cantor . "\n";
                echo "Tipo de Música: " . $this->tipoDeMusica . "\n";
                echo "-------------------------------------------\n";
            }
        }else{
            echo "Não encontrada";
        }
        
    }
    

    public function ExibeTodosShow(){
        echo "Show: \n";
        foreach ($this as $key => $value) {
            echo "Local: " . $this->local . "\n";
            echo "Data: " . $this->data . "\n";
            echo "Hora: " . $this->hora . "\n";
            echo "Previsão de Público: " . $this->previsaoDePublico . "\n";
            echo "Preço: " . $this->preco . "\n";
            echo "Descrição: " . $this->descricao . "\n";
            echo "Cantor: " . $this->cantor . "\n";
            echo "Tipo de Música: " . $this->tipoDeMusica . "\n";
            echo "-------------------------------------------\n";
        }
    }
}

//input
$evento = new Show(
    "Local do Evento",
    "2023-08-24",
    "20:00",
    1000,
    50.00,
    "Descrição do Evento",
    "Cantor do Show",
    "Tipo de Música"
);

//select
$evento->ExibeTodosShow();

//select com filtro
$evento->ExibeUmShow("Tipo");

