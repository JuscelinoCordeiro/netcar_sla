<?php

if (!defined('BASEPATH'))
    exit('No	direct script access allowed');

class M_faturamento extends CI_Model {

    public function listarFaturamentoDiario() {
        $dataHoje = date("Y-m-d");
        $faturamento = "select f.*, tv.tipo, s.servico "
                . " from faturamento as f "
                . " inner join tipo_veiculo as tv on f.cd_tpveiculo = tv.cd_tpveiculo"
                . " inner JOIN servico as s on f.cd_servico = s.cd_servico"
                . " where f.data = ?"
                . " order by f.data asc , f.horario asc";

        $total = "select sum(valor) as total from faturamento where data = ?";

        $dados['faturamento'] = $this->db->query($faturamento, $dataHoje)->result();
        $dados['total'] = $this->db->query($total, $dataHoje)->row()->total;

        return $dados;
    }

    public function listarFaturamentoPeriodo($dt_inicio, $dt_fim) {
        $faturamento = "select f.*, tv.tipo, s.servico "
                . " from faturamento as f "
                . " inner join tipo_veiculo as tv on f.cd_tpveiculo = tv.cd_tpveiculo"
                . " inner JOIN servico as s on f.cd_servico = s.cd_servico"
                . " where f.data between ? and ? "
                . " order by f.data asc , f.horario asc";

        $total = "select sum(valor) as total from faturamento where data between ? and ? ;";

        $dados['faturamento'] = $this->db->query($faturamento, array($dt_inicio, $dt_fim))->result();
        $dados['total'] = $this->db->query($total, array($dt_inicio, $dt_fim))->row()->total;

        return $dados;
    }

    public function setFaturamento($dados) {
        $sql = $sql = "insert into faturamento (cd_tpveiculo, cd_servico, data, horario, valor)"
                . " values (?, ?, ?, ?,? )";
        //$finalizado->cd_tpveiculo, $finalizado->cd_servico, $finalizado->data, $finalizado->horario, $finalizado->valor
        return $this->db->query($sql, array((int) $dados->cd_tpveiculo, (int) $dados->cd_servico, $dados->data, $dados->horario, floatval($dados->preco)));
    }

}
