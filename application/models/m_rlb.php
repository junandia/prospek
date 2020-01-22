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
			$this->db->from('data_rlb');
			$this->db->order_by('bulan','ASC');
			return $this->db->get()->result();
		}

		public function count(){
			return $this->db->count_all_results('data_rlb');
		}
		public function chek_duplicat($id){
        	$QuerySql = $this->db->query("SELECT bulan FROM data_rlb WHERE bulan IN ('$id')");
        	return $QuerySql->row();
    	}
    	public function update_duplicat($bulan, $jumlah_pelanggan, $jumlah_produk, $pendapatan) {
        $this->db->query('UPDATE data_rlb SET 	jumlah_pelanggan = "'.$jumlah_pelanggan.'",
        										jumlah_produk = "'.$jumlah_produk.'",
        										pendapatan = "'.$pendapatan.'" WHERE bulan = "'.$bulan.'"');
	    }
	    public function upload($bulan, $jumlah_pelanggan, $jumlah_produk, $pendapatan)
	    {
	        $this->db->query('REPLACE INTO data_rlb (bulan, jumlah_pelanggan, jumlah_produk, pendapatan)
	            VALUES("'.$bulan.'", 
	                    "'.$jumlah_pelanggan.'", 
	                    "'.$jumlah_produk.'", 
	                    "'.$pendapatan.'")
	                ');
	    } 
	    public function matrixdet($data){
			$rumus = ($data[0][0] * $data[1][1] * $data[2][2]) + ($data[0][1] * $data[1][2] * $data[2][0]) + ($data[0][2] * $data[1][0] * $data[2][1]) - ($data[0][1] * $data[1][0] * $data[2][2]) - ($data[0][0] * $data[1][2] * $data[2][1]) - ($data[0][2] * $data[1][1] * $data[2][0]);

			return $rumus;
		}
	}
?>