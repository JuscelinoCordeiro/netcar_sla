<?php

    if (!defined('BASEPATH'))
        exit('No	direct script access allowed');

    class M_faturamento extends CI_Model {

        public function getFaturamentoDiario() {
            $data_now = date("Y-m-d");
            $sql = "select SUM(faturamento) as faturamento_diario from faturamento where data BETWEEN '" . $data_now . " 00:00:00' AND '" . $data_now . " 23:59:59'";
            return $this->db->query($sql);
        }

        public function getFaturamentoMensal() {
            $sql = "select sum(faturamento) as faturamento_mensal from faturamento WHERE data BETWEEN DATE_ADD(CURRENT_DATE(), INTERVAL -30 DAY) AND CURRENT_DATE()";
            return $this->db->query($sql);
        }

        public function setFaturamento($dados) {
            $sql = $sql = "insert into faturamento (cd_tpveiculo, cd_servico, data, horario, valor)"
                    . " values (?, ?, ?, ?,? )";
            //$finalizado->cd_tpveiculo, $finalizado->cd_servico, $finalizado->data, $finalizado->horario, $finalizado->valor
            return $this->db->query($sql, array((int) $dados->cd_tpveiculo, (int) $dados->cd_servico, $dados->data, $dados->horario, floatval($dados->preco)));
        }

    }

?>