<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('M_rekamedis');
		check_not_login();
		
	}
	
	public function index()
	{
		$this->form_validation->set_rules('dari', 'Dari Tanggal', 'trim|required', 
			array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_rules('sampai', 'Sampai Tanggal', 'trim|required', 
			array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if($this->form_validation->run() == FALSE) {

			$this->template->load('template', 'laporan/laporan');
		}else {
			$dari = $this->input->post('dari', TRUE);
			$sampai = $this->input->post('sampai', TRUE);

				$where = ['rekamedis.tanggal >=' => $dari, 'rekamedis.tanggal <=' => $sampai];
				$data['report'] = $this->M_rekamedis->report($where);

	        	$this->template->load('template', 'laporan/lap_rkm',$data);
						
		}
    }
} 