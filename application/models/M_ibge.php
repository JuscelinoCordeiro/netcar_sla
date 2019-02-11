<?php
	if (!defined('BASEPATH')) exit('No	direct script access allowed');


	class M_ibge extends CI_Model {
		public function __construct() {
			parent::__construct();
		}

		public function pegarTodasRegioes() {
			$sql = "SELECT * FROM REGIAO_IBGE";

			return $this->db->query($sql);
		}

		public function pegarRegiaoPorId($id) {
			$sql = "SELECT * FROM REGIAO_IBGE WHERE ID_REGIAO_IBGE = ?";
			return $this->db->query($sql, $id);
		}

		public function pegarTodosEstados() {
			$sql = "SELECT * FROM UF_IBGE ORDER BY NM_UF ASC";

			return $this->db->query($sql);
		}

		public function pegarEstadoPorId($id) {
			$sql = "SELECT * FROM UF_IBGE WHERE ID_UF_IBGE = ?";
			return $this->db->query($sql, $id);
		}

		public function buscarMunicipiosPorRegiao($id) {
			$sql = "SELECT MI.ID_MUNI_IBGE, MI.NM_MUNI, UI.ID_UF_IBGE, UI.SIGLA_UF, UI.NM_UF, RI.ID_REGIAO_IBGE, RI.NM_REGIAO_IBGE 
					FROM MUNI_IBGE AS MI INNER JOIN UF_IBGE AS UI 
					ON UI.ID_UF_IBGE = MI.ID_UF_IBGE 
					INNER JOIN REGIAO_IBGE AS RI
					ON RI.ID_REGIAO_IBGE = UI.ID_REGIAO_IBGE
					WHERE UI.ID_REGIAO_IBGE = ? 
					";

			return $this->db->query($sql, $id);
		}

		public function buscarMunicipiosPorEstado($id) {
			$sql = "SELECT MI.ID_MUNI_IBGE, MI.NM_MUNI, UI.ID_UF_IBGE, UI.SIGLA_UF, UI.NM_UF 
					FROM MUNI_IBGE AS MI INNER JOIN UF_IBGE AS UI 
					ON UI.ID_UF_IBGE = MI.ID_UF_IBGE 
					WHERE UI.ID_UF_IBGE = ? 
					ORDER BY MI.NM_MUNI ASC";

			return $this->db->query($sql, $id);
		}

		public function buscarEstadoPorRegiao($id) {
			$sql = "SELECT RI.NM_REGIAO_IBGE, UI.* 
					FROM REGIAO_IBGE AS RI INNER JOIN UF_IBGE AS UI 
					ON RI.ID_REGIAO_IBGE = UI.ID_REGIAO_IBGE
					WHERE RI.ID_REGIAO_IBGE = ? 
					ORDER BY UI.NM_UF ASC";
			return $this->db->query($sql, $id);
		}

		public function cadastrarBairro ($dadosBairro){
			$sql = "INSERT INTO BAIRRO (NM_BAIRRO, ID_MUNI_IBGE) VALUES (?, ?)";

			return $this->db->query($sql,$dadosBairro);
		}


	}
