<?php

    class Veiculo {

        //ATRIBUTOS
        //======================================================================
        private $cd_tpveiculo;
        private $tipo;

        //METODOS SET
        //======================================================================
        public function setCodigo($cd_tpveiculo) {
            $this->cd_tpveiculo = $cd_tpveiculo;
        }

        public function setTipo($tipo) {
            $this->tipo = $tipo;
        }

        //METODOS GET
        //======================================================================
        public function getCodigo() {
            return $this->cd_tpveiculo;
        }

        public function getTipo() {
            return $this->tipo;
        }

    }
