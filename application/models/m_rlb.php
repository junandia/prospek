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
	}
?>