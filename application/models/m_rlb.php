<?php
	/**
	 * Rismawan Junandia
	 */
	class M_rlb extends CI_Model
	{
		
		public function __construct(){
			parent::__construct();
		}

		public function getAll(){
			return $this->db->get('data_rlb')->result();
		}

		public function count(){
			return $this->db->count_all_results('data_rlb');
		}
	}
?>