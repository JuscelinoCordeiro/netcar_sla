<?php

if (!defined('BASEPATH'))
    exit('No	direct script access allowed');

class M_usuario extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getUsuarios() {
        $sql = "select u.*,up.perfil from usuario u inner join usuario_perfil up on nivel = id_perfil";
        return $this->db->query($sql);
    }

    //SEM SENHA E COM NIVEL 0 DEFAULT (USUÁRIO)
    public function cadastrarUsuario($dados) {
        $sql = "INSERT INTO usuario"
                . "(nome, idt, endereco, celular, nivel, fixo)"
                . " VALUES (?, ?, ?, ?, ?, ?)";
        return $this->db->query($sql, array($dados['nome'], $dados['idt'], $dados['endereco'], $dados['celular'], $dados['nivel'], $dados['fixo']));
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

}
