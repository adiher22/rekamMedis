<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poli  extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_poli');
		check_not_login();
		
	}
	
	public function index()
	{
		$data = [   'title' => 'Manajemen Data Poli',
					'row' => $this->M_poli->get()];
		$this->template->load('template', 'poli/poli', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('nama_poli', 'Nama Poli', 'trim|required', 
		array(	'required' => '%s Harus Diisi'));

	

	$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

	if($this->form_validation->run() == FALSE) {
		
		$data['title'] = "Management Data Poli";
		$data['row'] = $this->M_poli->get();
		$this->template->load('template', 'poli/poli', $data);
	}else {
		$post = $this->input->post(null, TRUE);
		$this->M_poli->add($post);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('sukses', 'Data Berhasil Ditambahkan');
			redirect(base_url('poli'),'refresh');
		}
		
	}




	}
	public function edit($id)
	{
		$this->form_validation->set_rules('nama_dokter', 'Nama Dokter', 'trim|required', 
			array(	'required' => '%s Harus Diisi'));


		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if($this->form_validation->run() == FALSE) {
			$query = $this->M_poli->get($id);
			if($query->num_rows() > 0){
				$data['row'] = $query->row();
				
				$this->template->load('template', 'poli/edit',$data);

			}else{
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='".site_url('dokter')."';</script>";
			}
			
		}else {
			$post = $this->input->post(null, TRUE);
			$this->M_poli->edit($post);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('sukses', 'Data Berhasil Diperbarui');
			redirect(base_url('poli'),'refresh');
			}else{
				$this->session->set_flashdata('sukses', 'Data Berhasil Disimpan');
				redirect(base_url('poli'),'refresh');
			}
		
		}

		
	}

	public function hapus()
	{
		$id = $this->input->post('poli_id');
		$this->M_poli->del($id);

		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('sukses', 'Data Berhasil Dihapus');
			redirect(base_url('poli'),'refresh');
			}
			

	}

	public function getpoli($id)
    {
        $id = encode_php_tags($id);
        $query = $this->M_poli->cekPoli($id);
        output_json($query);
    }


}