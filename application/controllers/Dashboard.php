<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('M_rekamedis');
		$this->load->model('M_obat');
		$this->load->model('M_pasien');
		$this->load->model('M_poli');
		$this->load->model('M_dokter');
		$this->load->model('M_ranap');
		$this->load->model('M_rkm');
		
		
	}
	
	public function index()
	{
		check_not_login();
		$data['dokter'] = $this->M_dokter->count('dokter');
		$data['pasien'] = $this->M_pasien->count('pasien');
		$data['obat'] = $this->M_obat->count('obat');
		$data['rawat_inap'] = $this->M_ranap->count('rawat_inap');
		$data['barang_min'] = $this->M_obat->min('obat', 'stok', 5);
		$data['last'] = $this->M_rkm->get_last('r_rkm', 5, 'no_rm');
		$data['rawat_jalan'] = $this->M_rekamedis->count('rekamedis');
		// $data['rajal']	= $this->M_rekamedis->get();
		// $data['ranap']  = $this->M_ranap->get();
		// Line Chart
        $bln = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $data['rjn'] = [];
        $data['rnp'] = [];

        foreach ($bln as $b) {
            $data['rjn'][] = $this->M_rekamedis->chartRekamedis($b);
			$data['rnp'][] = $this->M_ranap->chartRanap($b);
        }
		$this->template->load('template', 'dashboard', $data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */