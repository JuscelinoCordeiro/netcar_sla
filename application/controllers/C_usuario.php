<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_usuario extends MY_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->logado) {
            redirect('c_login');
        }

        $this->load->model('m_usuario');
    }

    public function index() {

//        $info['titulo'] = "Serviços";
//        $dados['servicos'] = $this->m_servico->getservicos();
//        $this->load->view('header', $info);
//        $this->load->view('navbar');
//        $this->load->view('v_servico', $dados);
//        $this->load->view('footer');
    }

    public function listarUsuarios() {
        $dados['usuarios'] = $this->m_usuario->getUsuarios();
        $dados['titulo'] = "Usuários";
        $this->showTemplate('v_usuario', $dados);
    }

    public function excluirUsuario($cd_usuario) {
        $valida = $this->m_usuario->excluirUsuario($cd_usuario);
//        $dados['titulo'] = "Usuários";
//        $this->showTemplate('v_usuario', $dados);
    }

    public function cadastrarUsuario() {
        if (($this->input->post('acao') !== null) && ($this->input->post('acao') === "cadastrar" )) {
            $dados['nome'] = $this->input->post('nome');
            $dados['idt'] = $this->input->post('idt');
            $dados['endereco'] = $this->input->post('endereco');
            $dados['celular'] = $this->input->post('celular');
            $dados['fixo'] = $this->input->post('fixo');
            $dados['nivel'] = $this->input->post('nivel');
//            print_r($dados);
            $valida['mensagem'] = $this->m_usuario->cadastrarUsuario($dados);

            unset($dados);

            $this->showAjax('v_mensagem', $valida);
        } else {
            $dados['titulo'] = "teste ajax";
            $this->showAjax('inc/v_inc_usuario_adicionar', $dados);
        }
    }

    public function editarUsuario($cd_usuario) {
        $dados['usuario'] = $this->m_usuario->getUsuarioById($cd_usuario);
//        print_r($dados['usuario']);

        $dados['titulo'] = "Editar Usuário";

        if (isset($dados['usuario']) && !empty($dados['usuario'])) {
            $this->showAjax('inc/v_inc_usuario_editar', $dados);
        } else {
            $mensagem['mensagem'] = "Usuário inexistente";
            $this->showAjax('v_mensagem', $mensagem);
        }
    }

//
//    public function municipiosPorRegiao() {
//
//        $info['titulo'] = "Tela Regiões";
//        $info['descricao'] = "Municípios por Regio";
//
//        $idRegiao = (int) strip_tags($this->input->post('valor'));
//        if (isset($idRegiao) && !empty($idRegiao)) {
//            $dados['muniRegiao'] = $this->m_ibge->buscarMunicipiosPorRegiao($idRegiao);
//        }
//
//        $this->load->view('header', $info);
//        $this->load->view('v_inicio', $dados);
//        $this->load->view('footer');
//    }
//
//    public function municipiosPorEstado() {
//
//        $info['titulo'] = "Tela Regi�es";
//        $info['descricao'] = "Munic�pios por Estado";
//
//        $idEstado = (int) strip_tags($this->input->post('valor'));
//        $info['estado'] = $this->m_ibge->pegarEstadoPorId($idEstado)->row()->NM_UF;
//        if (isset($idEstado) && !empty($idEstado)) {
//            $info['muniEstado'] = $this->m_ibge->buscarMunicipiosPorEstado($idEstado);
//        }
//
//        $this->load->view('inc/v_inc_muniEstado', $info);
//    }
//
////		BUSCAR OS ESTADOS, DADO UMA REGIAO
//    public function estadosPorRegiao() {
//        $info['titulo'] = "Tela Regi�es";
//        $info['descricao'] = "Estados por Regiao";
//
//        $idRegiao = (int) strip_tags($this->input->post('valor'));
//        if (isset($idRegiao) && !empty($idRegiao)) {
//            $info['estRegiao'] = $this->m_ibge->buscarEstadoPorRegiao($idRegiao);
//        }
//
//        $info['regiao'] = $this->m_ibge->pegarRegiaoPorId($idRegiao)->row()->NM_REGIAO_IBGE;
//
//        $this->load->view('inc/v_inc_estRegioes', $info);
//    }
//
//    //FUN��O PARA O COMBOBOX SELECT DE CADASTRO DE BAIRRO
//    public function getEstadosPorRegiao() {
//        $idRegiao = (int) strip_tags($this->input->post('valor'));
//        if (isset($idRegiao) && !empty($idRegiao)) {
//            $estRegiao = $this->m_ibge->buscarEstadoPorRegiao($idRegiao)->result();
//            $option['option'] = "<option value=''>Selecione um estado</option>";
//            foreach ($estRegiao as $linha) {
//                $option['option'] .= "\"<option value='$linha->ID_UF_IBGE'>$linha->NM_UF</option>\"";
//            }
//        } else {
//            $option = "ERRO";
//        }
////			return $option;
//        $this->load->view('inc/v_inc_selEstado', $option);
//    }
//
//    //FUN��O PARA O COMBOBOX SELECT DE CADASTRO DE BAIRRO
//    public function getMunicipiosPorEstado() {
//        $idEstado = (int) strip_tags($this->input->post('valor'));
//        if (isset($idEstado) && !empty($idEstado)) {
//            $municipios = $this->m_ibge->buscarMunicipiosPorEstado($idEstado)->result();
//            $option['option'] = "<option value=''>Selecione um municipio</option>";
//            foreach ($municipios as $municipio) {
//                $option['option'] .= "\"<option value='$municipio->ID_MUNI_IBGE'>$municipio->NM_MUNI</option>\"";
//            }
//        } else {
//            $option = "ERRO";
//        }
////			return $option;
//        $this->load->view('inc/v_inc_selMunicipio', $option);
//    }
//
//    public function cadastrarBairro() {
//        $cadastrar = $this->input->post('cadastrar');
//
//        if ($cadastrar) {
//            $idRegiao = $this->input->post('idRegiao');
//            $idEstado = $this->input->post('idEstado');
//            $idMunicipio = $this->input->post('idMunicipio');
//            $bairro = $this->input->post('bairro');
//
//            $dadosBairro = array($bairro, $idMunicipio);
//
//            $info['cadastro'] = $this->m_ibge->cadastrarBairro($dadosBairro);
//        } else {
//            $info['titulo'] = "Tela cadastro de bairro";
//            $info['descricao'] = "Cadastro de bairro em um estado espec�fico";
//
//            $this->load->view('inc/v_inc_cadBairro', $info);
//        }
//    }
}
