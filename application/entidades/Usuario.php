<?php

    class Usuario {

        //ATRIBUTOS
        //======================================================================
        private $cd_usuario;
        private $nome;
        private $identidade;
        private $endereco;
        private $celular;
        private $fixo;
        private $perfil;
        private $ativo;

        //METODOS SET
        //======================================================================
        public function setCodigo($cd_usuario) {
            $this->cd_usuario = $cd_usuario;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function setIdentidade($idt) {
            $this->identidade = $idt;
        }

        public function setEndereco($end) {
            $this->endereco = $end;
        }

        public function setCelular($celular) {
            $this->celular = $celular;
        }

        public function setFixo($fixo) {
            $this->fixo = $fixo;
        }

        public function setPerfil($perfil) {
            $this->perfil = $perfil;
        }

        public function setAtivo($ativo) {
            $this->ativo = $ativo;
        }

        //METODOS GET
        //======================================================================
        public function getCodigo() {
            return $this->cd_usuario;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getIdentidade() {
            return $this->identidade;
        }

        public function getEndereco() {
            return $this->endereco;
        }

        public function getCelular() {
            return $this->celular;
        }

        public function getFixo() {
            return $this->fixo;
        }

        public function getPerfil() {
            return $this->perfil;
        }

        public function getAtivo() {
            return $this->ativo;
        }

    }
