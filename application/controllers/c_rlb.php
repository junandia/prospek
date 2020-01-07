<?php
class C_rlb extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->library('Excel');
		$this->load->model('m_rlb');
	}

	public function index(){
		$data = [
			'rlb' => $this->m_rlb->getAll(),
		];
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('rlb/index', $data);
        $this->load->view('templates/footer');
	}

	public function json(){
		$data = $this->m_rlb->getAll();
		//var_dump($query);
		echo json_encode($data);
	}
	public function import(){
		if(isset($_FILES["file"]["name"]))
			{
				$path = $_FILES["file"]["tmp_name"];
				$object = PHPExcel_IOFactory::load($path);
				foreach($object->getWorksheetIterator() as $worksheet)
				{
					$highestRow = $worksheet->getHighestRow();
					$highestColumn = $worksheet->getHighestColumn();
					for($row=2; $row<=$highestRow; $row++)
					{   
						$bulan        = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
						$jumlah_pelanggan          = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
						$jumlah_produk          = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
						$pendapatan            = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					
					$cek_duplicat = $this->m_rlb->chek_duplicat($bulan);
					if ($cek_duplicat != NULL) {
						if ($cek_duplicat->bulan == $bulan) {
							$this->m_rlb->update_duplicat($bulan, $jumlah_pelanggan, $jumlah_produk, $pendapatan);
						}else{
							$this->m_rlb->upload($bulan, $jumlah_pelanggan, $jumlah_produk, $pendapatan);
						}
					}else{
						$this->m_rlb->upload($bulan, $jumlah_pelanggan, $jumlah_produk, $pendapatan);
					}
					
					
					}
				}
				redirect('C_rlb');
			}
		}
}