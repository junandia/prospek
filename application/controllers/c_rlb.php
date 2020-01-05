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
}