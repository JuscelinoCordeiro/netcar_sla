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
                ORDER BY t.cd_servico";
        return $this->db->query($sql);
    }

    public function getTarifaServico($cd_servico) {
        $sql = "SELECT *
                FROM tarifa
                where cd_servico = ?";

        return $this->db->query($sql, $cd_servico);
    }

    public function getTarifaServicoTpVeiculo($cd_servico, $cd_tpveiculo) {
        $sql = "SELECT preco
                FROM tarifa
                where cd_servico = ? and cd_tpveiculo = ?";

        return $this->db->query($sql, array($cd_servico, $cd_tpveiculo));
    }

    public function editarTarifa($cd_servico, $cd_tpveiculo, $preco) {
        $sql = "UPDATE tarifa SET preco = ?
                where cd_servico = ? and cd_tpveiculo = ?";

        return $this->db->query($sql, array($preco, (int) $cd_servico, (int) $cd_tpveiculo));
    }

}
