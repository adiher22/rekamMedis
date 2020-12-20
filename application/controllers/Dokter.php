<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_dokter');
		check_not_login();
		
	}
	
	public function index()
	{
		$data = [   'title' => 'Manajemen Data Dokter',
					'row' => $this->M_dokter->get()];
		$this->template->load('template', 'dokter/dokter', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('nama_dokter', 'Nama Dokter', 'trim|required', 
		array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required', 
		array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_rules('spesialis', 'Spesialis', 'trim|required', 
		array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_rules('fee_dokter', 'Fee Dokter', 'trim|required|is_numeric', 
		array(	'required' => '%s Harus Diisi',
				'is_numeric' => '%s Harus Diisi Angka'));

	$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

	if($this->form_validation->run() == FALSE) {
		
		$data['title'] = "Management Data Dokter";
		$data['row'] = $this->M_dokter->get();
		$this->template->load('template', 'dokter/dokter', $data);
	}else {
		$post = $this->input->post(null, TRUE);
		$this->M_dokter->add($post);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('sukses', 'Data Berhasil Ditambahkan');
			redirect(base_url('dokter'),'refresh');
		}
		
	}




	}
	public function edit($id)
	{
		$this->form_validation->set_rules('nama_dokter', 'Nama Dokter', 'trim|required', 
			array(	'required' => '%s Harus Diisi'));

			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required', 
			array(	'required' => '%s Harus Diisi'));
		
			$this->form_validation->set_rules('spesialis', 'Spesialis', 'trim|required', 
			array(	'required' => '%s Harus Diisi'));
	
			$this->form_validation->set_rules('fee_dokter', 'Fee Dokter', 'trim|required|is_numeric', 
			array(	'required' => '%s Harus Diisi',
					'is_numeric' => '%s Harus Diisi Angka'));
		

		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if($this->form_validation->run() == FALSE) {
			$query = $this->M_dokter->get($id);
			if($query->num_rows() > 0){
				$data['row'] = $query->row();
				
				$this->template->load('template', 'dokter/edit',$data);

			}else{
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='".site_url('dokter')."';</script>";
			}
			
		}else {
			$post = $this->input->post(null, TRUE);
			$this->M_dokter->edit($post);
			if($this->db->affected_rows() > 0) {
		    $this->session->set_flashdata('sukses', 'Data Berhasil Diperbarui');
			redirect(base_url('dokter'),'refresh');
			}else{
				$this->session->set_flashdata('sukses', 'Data Berhasil Disimpan');
				redirect(base_url('dokter'),'refresh');
			}
			
		}

		
	}

	public function hapus()
	{
		$id = $this->input->post('dokter_id');
		$this->M_dokter->del($id);

		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('sukses', 'Data Berhasil Dihapus');
			redirect(base_url('dokter'),'refresh');
			}
			

	}


}