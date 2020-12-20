<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pasien');
		$this->load->model('M_rekamedis');
		
		check_not_login();
		
	}
	
	public function index()
	{
		$data = [   'title' => 'Manajemen pasien',
					'row' => $this->M_pasien->get()];
		$this->template->load('template', 'pasien/pasien', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('nama_pasien', 'Nama pasien', 'trim|required', 
		array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required', 
		array(	'required' => '%s Harus Diisi'));
	
		$this->form_validation->set_rules('no_hp', 'No HP', 'trim|required|is_numeric', 
		array(	'required' => '%s Harus Diisi',
				'is_numeric' => '%s Harus diisi angka'));

		$this->form_validation->set_rules('umur', 'Umur pasien', 'trim|required', 
		array(	'required' => '%s Harus Diisi'));
		
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required', 
        array(	'required' => '%s Harus Diisi'));
        
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir pasien', 'trim|required', 
        array(	'required' => '%s Harus Diisi'));

        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required', 
        array(	'required' => '%s Harus Diisi'));

        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', 
		array(	'required' => '%s Harus Diisi'));

	$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

	if($this->form_validation->run() == FALSE) {
		
		$data['pasien_kd'] = $this->M_pasien->kd_pasien();

		$this->template->load('template', 'pasien/tambah', $data);
	}else {
		$post = $this->input->post(null, TRUE);
		$this->M_pasien->add($post);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('sukses', 'Data Berhasil Ditambahkan');
			redirect(base_url('pasien'),'refresh');
		}
		
	}




	}
	public function edit($id)
	{
		$this->form_validation->set_rules('nama_pasien', 'Nama pasien', 'trim|required', 
		array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required', 
		array(	'required' => '%s Harus Diisi'));
	
		$this->form_validation->set_rules('no_hp', 'No HP', 'trim|required|is_numeric', 
		array(	'required' => '%s Harus Diisi',
				'is_numeric' => '%s Harus diisi angka'));

		$this->form_validation->set_rules('umur', 'Umur pasien', 'trim|required', 
        array(	'required' => '%s Harus Diisi'));
        
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir pasien', 'trim|required', 
        array(	'required' => '%s Harus Diisi'));

        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required', 
        array(	'required' => '%s Harus Diisi'));

        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', 
		array(	'required' => '%s Harus Diisi'));
		

		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if($this->form_validation->run() == FALSE) {
			$query = $this->M_pasien->get($id);
			if($query->num_rows() > 0){
				$data['row'] = $query->row();
			
				$this->template->load('template', 'pasien/edit',$data);

			}else{
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='".site_url('pasien')."';</script>";
			}
			
		}else {
			$post = $this->input->post(null, TRUE);
			$this->M_pasien->edit($post);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('sukses', 'Data Berhasil Diperbarui');
				redirect(base_url('pasien'),'refresh');
			}else{
				$this->session->set_flashdata('sukses', 'Data Berhasil Disimpan');
				redirect(base_url('pasien'),'refresh');
			}
			
		}

		
	}

	public function hapus()
	{
		$id = $this->input->post('pasien_kd');
		$this->M_pasien->del($id);

		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('sukses', 'Data Berhasil Dihapus');
			redirect(base_url('pasien'),'refresh');
			}
			

	}


}