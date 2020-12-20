<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		check_not_login();
		check_admin();

		$data['row'] = $this->M_user->get();

		$this->template->load('template', 'user/user_data', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[4]|max_length[25]', 
			array(	'required' => '%s Harus Diisi',
					'min_length' => '%s Minimal 4 karakter',
					'max_length' => '%s Maksimal 25 Karakter'));

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[25]',
			array(	'required' => '%s Harus Diisi',
					'min_length' => '%s Minimal 4 Karakter',
					'max_length' => '%s Maksimal 25 Karakter'));

		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[25]',
			array(	'required' => '%s Harus Diisi',
					'min_length' => '%s Minimal 4 Karakter',
					'max_length' => '%s Maksimal 25 Karakter'));

		$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'trim|required|matches[password]', 
			array( 'required' => '%s Harus Diisi', 
				    'matches' => '%s Harus Sesuai Dengan Password'));

		$this->form_validation->set_rules('level', 'Level Akses', 'trim|required',
			array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if($this->form_validation->run() == FALSE) {

			$this->template->load('template', 'user/tambah');
		}else {
			$post = $this->input->post(null, TRUE);
			$this->M_user->add($post);
			if($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Berhasil Disimpan');</script>";
			}
			echo "<script>window.location='".site_url('user')."';</script>";
		}

		
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[4]|max_length[25]', 
			array(	'required' => '%s Harus Diisi',
					'min_length' => '%s Minimal 4 karakter',
					'max_length' => '%s Maksimal 25 Karakter'));

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[12]',
			array(	'required' => '%s Harus Diisi',
					'min_length' => '%s Minimal 4 Karakter',
					'max_length' => '%s Maksimal 12 Karakter'));
		if($this->input->post('password')) {
			$this->form_validation->set_rules('password', 'Password', 'trim');
			$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'trim|matches[password]', 
			array(  
				    'matches' => '%s Harus Sesuai Dengan Password'));
	     }
	     if($this->input->post('passconf')) {
			$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'trim|matches[password]', 
			array(  
				    'matches' => '%s Harus Sesuai Dengan Password'));
	     }
		

		$this->form_validation->set_rules('level', 'Level Akses', 'trim|required',
			array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if($this->form_validation->run() == FALSE) {
			$query = $this->M_user->get($id);
			if($query->num_rows() > 0){
				$data['row'] = $query->row();
				$this->template->load('template', 'user/edit',$data);

			}else{
				echo "<script>alert('Data Tidak Ditemukan');</script>";
				echo "<script>window.location='".site_url('user')."';</script>";
			}
			
		}else {
			$post = $this->input->post(null, TRUE);
			$this->M_user->edit($post);
			if($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Berhasil Diedit');</script>";
			}
			echo "<script>window.location='".site_url('user')."';</script>";
		}

		
	}

	public function hapus()
	{
		$id = $this->input->post('user_id');
		$this->M_user->del($id);

		if($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Berhasil Dihapus');</script>";
			}
			echo "<script>window.location='".site_url('user')."';</script>";

	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */