<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_obat');
		check_not_login();
		
	}
	
	public function index()
	{
		$data = [   'title' => 'Manajemen Obat',
					'row' => $this->M_obat->get()];
		$this->template->load('template', 'obat/obat', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('nama_obat', 'Nama Obat', 'trim|required', 
		array(	'required' => '%s Harus Diisi'));

        $this->form_validation->set_rules('stok', 'Stok', 'trim|required|is_numeric', 
        array(	'required' => '%s Harus Diisi',
                'is_numeric' => '%s Harus Diisi Angka'));
		
		$this->form_validation->set_rules('harga', 'Harga', 'trim|required|is_numeric', 
		array(	'required' => '%s Harus Diisi',
				'is_numeric' => '%s Harus Diisi Dengan Angka'));

	$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

	if($this->form_validation->run() == FALSE) {
		
		$data['row'] = $this->M_obat->get();
		$data['title'] = 'Data Obat';
		$this->template->load('template', 'obat/obat', $data);
	}else {
		$post = $this->input->post(null, TRUE);
		$this->M_obat->add($post);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('sukses', 'Data Berhasil Ditambahkan');
			redirect(base_url('obat'),'refresh');
		}
		
	}




	}
	public function edit($id)
	{
		$this->form_validation->set_rules('nama_obat', 'Nama Obat', 'trim|required', 
		array(	'required' => '%s Harus Diisi'));

        $this->form_validation->set_rules('stok', 'Stok', 'trim|required|is_numeric', 
        array(	'required' => '%s Harus Diisi',
                'is_numeric' => '%s Harus Diisi Angka'));
		
		$this->form_validation->set_rules('harga', 'Harga', 'trim|required', 
		array(	'required' => '%s Harus Diisi',
				'is_numeric' => '%s Harus Diisi Dengan Angka'));
				
		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if($this->form_validation->run() == FALSE) {
			$query = $this->M_obat->get($id);
			if($query->num_rows() > 0){
				$data['row'] = $query->row();
	
				$this->template->load('template', 'obat/edit',$data);

			}else{
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='".site_url('obat')."';</script>";
			}
			
		}else {
			$post = $this->input->post(null, TRUE);
			$this->M_obat->edit($post);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('sukses', 'Data Berhasil Diperbarui');
				redirect(base_url('obat'),'refresh');
			}else{
				$this->session->set_flashdata('sukses', 'Data Berhasil Disimpan');
				redirect(base_url('obat'),'refresh');
			}
			
		}

		
	}

	public function hapus()
	{
		$id = $this->input->post('obat_id');
		$this->M_obat->del($id);

		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('sukses', 'Data Berhasil Dihapus');
			redirect(base_url('obat'),'refresh');	
		  }
			

	}
	public function getobat($id)
    {
        $id = encode_php_tags($id);
        $query = $this->M_obat->cekObat($id);
        output_json($query);
    }

}