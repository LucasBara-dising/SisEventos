<?php 
class Evento {
    // Atributos da classe
    private $local;
    private $data;
    private $hora;
    private $preco;
    private $descricao;

    // Construtor da classe
    public function CadastraEvento($local, $data, $hora, $preco, $descricao) {
        $this->local = $local;
        $this->data = $data;
        $this->hora = $hora;
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

     // Construtor da classe
    public function cadastraShow($local, $data, $hora, $preco, $descricao, $cantor, $tipoDeMusica) {
        parent::CadastraEvento($local, $data, $hora, $preco, $descricao);

        $this->cantor = $cantor;
        $this->tipoDeMusica = $tipoDeMusica;
    }
}


class Palestra extends Evento{
        // Atributos da classe Palestra
        private $palestrante;
        private $tema;
    
        public function getPalestrante() {
            return $this->palestrante;
        }
    
        public function setPalestrante($palestrante) {
            $this->palestrante = $palestrante;
        }
    
        public function getTema() {
            return $this->tema;
        }
    
        public function setTema($tema) {
            $this->tema = $tema;
        }
   
        // Construtor da classe
       public function CadastrarPalestra($local, $data, $hora, $preco, $descricao, $palestrante, $tema) {
           parent::CadastraEvento($local, $data, $hora, $preco, $descricao);
   
           $this->palestrante = $palestrante;
           $this->tema = $tema;
       }
}
   

