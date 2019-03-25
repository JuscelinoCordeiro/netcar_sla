<?php

if (!defined('BASEPATH'))
    exit('No	direct script access allowed');

class M_usuario extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getUsuarios() {
        $sql = "select u.cd_usuario, u.nome, u.endereco, u.celular, u.fixo, u.nivel, u.idt, up.perfil "
                . " from usuario u"
                . " inner join usuario_perfil up on u.nivel = up.id_perfil "
                . " order by u.nome";
        return $this->db->query($sql);
    }

    //SEM SENHA E COM NIVEL 0 DEFAULT (USUÁRIO)
    public function cadastrarUsuario($dados) {
        $sql = "INSERT INTO usuario"
                . "(nome, idt, endereco, celular, nivel, fixo)"
                . " VALUES (?, ?, ?, ?, ?, ?)";
        return $this->db->query($sql, array($dados['nome'], $dados['idt'], $dados['endereco'], $dados['celular'], $dados['nivel'], $dados['fixo']));
    }

    public function getUsuarioById($cd_usuario) {
        $sql = "select * from usuario where cd_usuario = ?";
        return $this->db->query($sql, $cd_usuario)->row_array();
    }

    public function excluirUsuario($cd_usuario) {
        $sql = "delete from usuario where cd_usuario = ?";
        return $this->db->query($sql, $cd_usuario);
    }

    public function editarUsuario($dados) {
        $sql = "update usuario set nome = ?, endereco = ?, celular = ?, fixo = ?, nivel = ?, idt = ? where cd_usuario = ?";
        return $this->db->query($sql, array($dados['nome'], $dados['endereco'], $dados['celular'], $dados['fixo'],
                    $dados['nivel'], $dados['idt'], $dados['cd_usuario']));
    }

    public function pesquisarUsuario($dados) {
        $sql = "select u.cd_usuario, u.nome, u.endereco, u.celular, u.fixo, u.nivel, u.idt, up.perfil "
                . " from usuario u"
                . " inner join usuario_perfil up on u.nivel = up.id_perfil"
                . " where u.nome like '%" . $dados . "%' or u.idt = " . $dados . "";
        return $this->db->query($sql)->row();
    }

}
