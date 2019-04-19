<?php

    if (!defined('BASEPATH'))
        exit('No	direct script access allowed');

    class M_tarifa extends CI_Model {

        public function __construct() {
            parent::__construct();
        }

        public function getTarifas() {
            $sql = "SELECT t.*, tv.tipo, s.servico
                FROM tarifa t
                INNER JOIN tipo_veiculo tv
                ON t.cd_tpveiculo = tv.cd_tpveiculo
                INNER JOIN servico s
                ON t.cd_servico = s.cd_servico
                where s.ativo = 1
                ORDER BY t.cd_servico, tv.tipo";
            return $this->db->query($sql);
        }

        public function getTarifaServico($cd_servico) {
            $sql = "SELECT *
                FROM tarifa
                where cd_servico = ?";

            return $this->db->query($sql, $cd_servico);
        }

        public function getTarifaServicoTpVeiculo($tarifa) {
            $sql = "SELECT preco
                FROM tarifa
                where cd_servico = ? and cd_tpveiculo = ?";

            return $this->db->query($sql, array($tarifa->servico, $tarifa->tipo_veiculo));
        }

        public function editarTarifa($tarifa) {
            $sql = "UPDATE tarifa SET preco = ?
                where cd_servico = ? and cd_tpveiculo = ?";

            return $this->db->query($sql, array($tarifa->preco, (int) $tarifa->servico, (int) $tarifa->tipo_veiculo));
        }

    }
