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
                ORDER BY t.cd_tpveiculo";
        return $this->db->query($sql);
    }

    public function getusuarioById($cd_usuario) {
        $sql = "select * from usuario where cd_usuario = ?";
        return $this->db->query($sql, $cd_usuario);
    }

    public function excluirUsuario($cd_usuario) {
        $sql = "delete from usuario u where cd_usuario = ?"
                . "inner join usuario_perfil up"
                . "on  u.cd_usuario = up.cod_usuario";
//        $sql2 = "delete from usuario_perfil where cod_usuario = ?";
        $valida1 = $this->db->query($sql, $cd_usuario);
//        $valida2 = $this->db->query($sql2, $cd_usuario);
        return ($valida1);
    }

    public function updateUsuario($cd_servico, $servico) {
        $sql = "update servico set servico = ? where cd_servico = ?";
        return $this->db->query($sql, array($servico, $cd_servico));
    }

    public function criarUsuario($servico) {
        $sql = "insert into servico (servico) values ?";
        return $this->db->query($sql, $servico);
    }

}
