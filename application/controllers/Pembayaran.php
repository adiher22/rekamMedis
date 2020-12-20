<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_rekamedis');
		$this->load->model('M_rkm');
		$this->load->model('M_obat');
		$this->load->model('M_dokter');
		$this->load->model('M_ranap');
		
		
		
		check_admin();
		check_not_login();
		
	} 
	
	
    public function add_($id)
	{
		$data = [   'title' => 'Data Pasien',
                    'rm' => $this->M_rekamedis->get($id)->row(),                        
					'obat' => $this->M_obat->get(),
					'r_rkm' => $this->M_rkm->get($id),
					'robat' => $this->M_obat->get_robat($id),
					'r_obat' => $this->M_rkm->get_r_obat($id)->row_array(),
					'total_obat' => $this->M_rkm->get_r_obat($id)->row_array()];
		$this->template->load('template', 'pembayaran/pembayaran', $data);

		

	}
	public function addbayar_($id)
	{
		$data = [   'title' => 'Data Pasien Rawat Inap',
                    'rm' => $this->M_ranap->get($id)->row(),                        
					'obat' => $this->M_obat->get(),
					'r_rkm' => $this->M_rkm->get($id),
					'robat' => $this->M_obat->get_robat($id),
					'r_obat' => $this->M_rkm->get_r_obat($id)->row_array(),
					'total_obat' => $this->M_rkm->get_r_obat($id)->row_array()];
		$this->template->load('template', 'ranap/pembayaran', $data);

		

	}

	public function cetak($id)
	{
		$data = [   'title' => 'Klinik Medika Citra Pratama',
					'rm' => $this->M_rekamedis->get($id)->row(),                         
					'rkm' => $this->M_rkm->get($id),
					'obat' => $this->M_obat->get(),
					'r_rkm' => $this->M_rkm->get($id)->row(),
					'robat' => $this->M_obat->get_robat($id),
					'r_obat' => $this->M_obat->get_robat($id)->row(),
					'total_obat' => $this->M_rkm->get_r_obat($id)->row_array()];
		$this->load->view('pembayaran/cetak', $data);

		

	}
	
	public function add_obat($id)
	{
		$input = $this->input->post('obat_id', true);
		$stok = $this->M_rkm->get_where('obat', ['obat_id' => $input])['stok'];

		
		$this->form_validation->set_rules('nama_obat', 'Nama Obat', 'trim|required', 
		array(	'required' => '%s Harus Diisi'));

        $this->form_validation->set_rules('jumlah', 'Jumlah', "required|trim|numeric|greater_than[0]|less_than[{$stok}]", 
        array(	'required' => '%s Harus Diisi',
				'numeric' => '%s Harus Diisi Angka',
				'greater_than' => '%s Harus berisi lebih dari 0',
				'less_than' => '%s Melebihi batas stok'));
		
		

	$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

	if($this->form_validation->run() == FALSE) {
		
		$query = $this->M_rekamedis->get($id);
		if($query->num_rows() > 0){
			$data['row'] = $query->row();
			$data = [   'title' => 'Data Pasien Berobat',
			'rm' => $this->M_rekamedis->get($id)->row(),
			'rkm' => $this->M_rkm->get($id),
			'obat' => $this->M_obat->get(),
			'robat' => $this->M_obat->get_robat($id),
			'r_obat' => $this->M_rkm->get_r_obat($id)->row_array(),
			'total_obat' => $this->M_rkm->get_r_obat($id)->row_array()];
		$this->template->load('template', 'pembayaran/pembayaran', $data);
		}else{
			echo "<script>alert('Data Tidak Ditemukan');</script>";
			echo "<script>window.location='".site_url('pembayaran')."';</script>";
		}
	}else {
		$post = $this->input->post(null, TRUE);
		$this->M_rkm->add_r_obat($post);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('sukses', 'Data Berhasil Ditambahkan');
			redirect(base_url('pembayaran/add_/'.$id),'refresh');
		}
		
	}
	}

	public function add_pembayaran($id)
	{
		
		
		$query = $this->M_rekamedis->get($id);
		if($query->num_rows() > 0){
			$data['row'] = $query->row();
			$data = [   'title' => 'Data Pasien Berobat',
			'rm' => $this->M_rekamedis->get($id)->row(),
			'rkm' => $this->M_rkm->get($id),
			'obat' => $this->M_obat->get(),
			'robat' => $this->M_obat->get_robat($id)];
		$this->template->load('template', 'pembayaran/pembayaran', $data);
		}else{
			echo "<script>alert('Data Tidak Ditemukan');</script>";
			echo "<script>window.location='".site_url('pembayaran')."';</script>";
		}
		
		$post = $this->input->post(null, TRUE);
		$this->M_rekamedis->selesai_bayar($id);
		$this->M_rkm->add_rkm($post);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('sukses', 'Data Berhasil Ditambahkan');
			redirect(base_url('pembayaran/cetak/'.$id),'refresh');
		}
		
	
	}
	
	public function add_bayar($id)
	{
		
		
		$query = $this->M_ranap->get($id);
		if($query->num_rows() > 0){
			$data['row'] = $query->row();
			$data = [   'title' => 'Data Pasien Rawat Inap',
			'rm' => $this->M_ranap->get($id)->row(),
			'rkm' => $this->M_rkm->get($id),
			'obat' => $this->M_obat->get(),
			'robat' => $this->M_obat->get_robat($id)];
		$this->template->load('template', 'ranap/pembayaran', $data);
		}else{
			echo "<script>alert('Data Tidak Ditemukan');</script>";
			echo "<script>window.location='".site_url('pembayaran')."';</script>";
		}
		
		$post = $this->input->post(null, TRUE);
		$this->M_ranap->selesai($id);
		$this->M_rkm->add_rkm($post);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('sukses', 'Data Berhasil Ditambahkan');
			redirect(base_url('pembayaran/cetak_/'.$id),'refresh');
		}
		
	
	}
	public function add_obat_ranap($id)
	{
		$input = $this->input->post('obat_id', true);
		$stok = $this->M_rkm->get_where('obat', ['obat_id' => $input])['stok'];

		
		$this->form_validation->set_rules('nama_obat', 'Nama Obat', 'trim|required', 
		array(	'required' => '%s Harus Diisi'));

        $this->form_validation->set_rules('jumlah', 'Jumlah', "required|trim|numeric|greater_than[0]|less_than[{$stok}]", 
        array(	'required' => '%s Harus Diisi',
				'numeric' => '%s Harus Diisi Angka',
				'greater_than' => '%s Harus berisi lebih dari 0',
				'less_than' => '%s Melebihi batas stok'));
		
		

	$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

	if($this->form_validation->run() == FALSE) {
		
		$query = $this->M_ranap->get($id);
		if($query->num_rows() > 0){
			$data['row'] = $query->row();
			$data = [   'title' => 'Data Pasien Berobat',
			'rm' => $this->M_ranap->get($id)->row(),
			'rkm' => $this->M_rkm->get($id),
			'obat' => $this->M_obat->get(),
			'robat' => $this->M_obat->get_robat($id),
			'r_obat' => $this->M_rkm->get_r_obat($id)->row_array(),
			'total_obat' => $this->M_rkm->get_r_obat($id)->row_array()];
		$this->template->load('template', 'ranap/pembayaran', $data);
		}else{
			echo "<script>alert('Data Tidak Ditemukan');</script>";
			echo "<script>window.location='".site_url('pembayaran')."';</script>";
		}
	}else {
		$post = $this->input->post(null, TRUE);
		$this->M_rkm->add_r_obat($post);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('sukses', 'Data Berhasil Ditambahkan');
			redirect(base_url('pembayaran/addbayar_/'.$id),'refresh');
		}
		
	}
	}
	public function cetak_($id)
	{
		$data = [   'title' => 'Klinik Medika Citra Pratama',
					'rm' => $this->M_ranap->get($id)->row(),                         
					'rkm' => $this->M_rkm->get($id)->row(),
					'obat' => $this->M_obat->get(),
					'r_rkm' => $this->M_rkm->get_ranap($id)->row(),
					'robat' => $this->M_obat->get_robat($id),
					'r_obat' => $this->M_obat->get_robat($id)->row(),
					'total_obat' => $this->M_rkm->get_ranap_obat($id)->row_array()];
		$this->load->view('ranap/cetak', $data);

		

	}
	
	
}