<?php

if (!defined('BASEPATH'))
    exit('No	direct script access allowed');

class M_faturamento extends CI_Model {

    public function getFaturamentoDiario() {
        $dataHoje = date("Y-m-d");
        $faturamento = "select f.*, tv.tipo, s.servico "
                . " from faturamento as f "
                . " inner join tipo_veiculo as tv on f.cd_tpveiculo = tv.cd_tpveiculo"
                . " inner JOIN servico as s on f.cd_servico = s.cd_servico"
                . " where f.data = ?"
                . " order by f.data asc , f.horario asc";

        $total = "select sum(valor) as total from faturamento;";

        $dados['faturamento'] = $this->db->query($faturamento, $dataHoje)->result();
        $dados['total'] = $this->db->query($total);

        return $dados;
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
