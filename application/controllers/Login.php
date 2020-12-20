<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		check_already_login();

		$this->load->view('login');
	}

	public function proses()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($post['login'])){
			$this->load->model('M_user');
			$query = $this->M_user->login($post);
			if($query->num_rows() > 0){
				$row = $query->row();

				$param = [ 'userid' => $row->user_id,
						   'level' => $row->level
				];
				$this->session->set_userdata($param);
				echo "<script>
					 alert('Selamat, Login Berhasil');
					 window.location='".site_url('dashboard')."';
					 </script>";
			}else {
				echo "<script>
					 alert('Login Gagal!');
					 window.location='".site_url('login')."';
					 </script>";
			}
		}
		
	}
	public function logout()
	{
		$param = ['userid', 'level'];
		$this->session->unset_userdata($param);

		echo "<script>
					 alert('Behasil Logout!');
					 window.location='".site_url('login')."';
					 </script>";
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */