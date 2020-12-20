<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekapitulasi extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		// $this->load->model('M_rekamedis');
		// $this->load->model('M_poli');
		// $this->load->model('M_pasien');
		// $this->load->model('M_obat');
		// $this->load->model('M_dokter');
		$this->load->model('M_rekap');
		$this->load->model('M_rkm');
		
		
		
		check_admin();
		check_not_login();
		
	}
	
	public function index()
	{
		$data = [   'title' => 'Data Rekapitulasi',
					'row' => $this->M_rekap->get(),
					'budget' => $this->M_rekap->get_budget()->row()];
		$this->template->load('template', 'rekap/data', $data);
	}
	
	public function add()
	{
		$this->form_validation->set_rules('jenis_pendapatan', 'Jenis Pendapatan', 'trim|regex_match[/[a-zA-Z]+$/]', 
		array(	'regex_match' => '%s Harus diisi huruf'));

		$this->form_validation->set_rules('lap_pendapatan', 'Laporan Pendapatan', 'trim|is_numeric', 
		array(	'is_numeric' => '%s Harus Diisi Angka'));


		$this->form_validation->set_rules('jenis_pengeluaran', 'Jenis Pengeluaran', 'trim|regex_match[/[a-zA-Z]+$/]', 
		array(	'regex_match' => '%s Harus diisi huruf'));

		$this->form_validation->set_rules('lap_pengeluaran', 'Laporan Pengeluaran', 'trim|is_numeric', 
		array(	'is_numeric' => '%s Harus Diisi Angka'));
		

		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if($this->form_validation->run() == FALSE) {
			
				$data['budget'] = $this->M_rekap->get_budget()->row();
				$data['rekap'] = $this->M_rkm->get_rekap()->result();
				$this->template->load('template', 'rekap/tambah',$data);
			
		}else {
			$post = $this->input->post(null, TRUE);
			$this->M_rekap->add($post);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('sukses', 'Data Berhasil Ditambahkan!');
				redirect(base_url('rekapitulasi'),'refresh');
			}
			
		}

	
	}
	public function report()
	{

	    $this->form_validation->set_rules('awal', 'Dari Tanggal', 'trim|required', 
			array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_rules('akhir', 'Sampai Tanggal', 'trim|required', 
			array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if($this->form_validation->run() == FALSE) {
			$data['title'] = "Laporan Rekapitulasi";
			$this->template->load('template', 'rekap/rep_recap', $data);
		}else {
			$dari = $this->input->post('awal', TRUE);
			$sampai = $this->input->post('akhir', TRUE);

				$where = ['rekapitulasi.tgl_input >=' => $dari, 'rekapitulasi.tgl_input <=' => $sampai];
				$data['report'] = $this->M_rekap->get_report($where)->result();
				$data['budget'] = $this->M_rekap->get_budget();
				$data['title'] = "Laporan Rekapitulasi";
				// var_dump($data);
				// die;
	        	$this->template->load('template', 'rekap/report',$data);
						
		}
	
	}
	public function cetak()
	{

	    
			$dari = $this->input->get('awal', TRUE);
			$sampai = $this->input->get('akhir', TRUE);
			if($dari != "" || $sampai != "") {
				$where = ['rekapitulasi.tgl_input >=' => $dari, 'rekapitulasi.tgl_input <=' => $sampai];
				$data['report'] = $this->M_rekap->get_report($where)->result();
				$data['budget'] = $this->M_rekap->get_budget();
				$data['title'] = "Laporan Rekapitulasi";
				// var_dump($data);
				// die;
	        	$this->load->view('rekap/cetak_',$data);
			}else{
				
				redirect(base_url('rekapitulasi/report'),'refresh');
				
			}
			
	}
	public function cetak_pdf()
	{
		$dari = $this->input->get('awal', TRUE);
		$sampai = $this->input->get('akhir', TRUE);
		if($dari != "" || $sampai != "") {
			$where = ['rekapitulasi.tgl_input >=' => $dari, 'rekapitulasi.tgl_input <=' => $sampai];
			$data['report'] = $this->M_rekap->get_report($where)->result();
			$data['budget'] = $this->M_rekap->get_budget();
			$data['title'] = "Laporan Rekapitulasi";
			// var_dump($data);
		}

		$html = $this->load->view('rekap/cetak_pdf', $data, TRUE);
		// Create an instance of the class:
		$mpdf = new \Mpdf\Mpdf();
		// Set header & footer
		$mpdf->SetHTMLHeader('
		<div style="text-align: left; font-weight: bold;">
			<img src="'.base_url('img/klinik-icon.png').'" style="height: 70px; width: auto;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
			<span style="font-size: 35px; font-weight: bold;"> Klinik Citra Prima Medika </span>
		</div>

		');
		$mpdf->SetHTMLFooter('
			<div style="padding: 10px 20px; background-color: #228B22; color: white; font-size: 12px;">
			Hak Cipta : '."Klinik Citra Prima Medika ".' 
		
			</div>');
		// Write some HTML code:
		$mpdf->WriteHTML($html);

		// Output tampil nama baru
		$nama_file_pdf = url_title("Klinik Citra Prima Medika",'dash','true').'-'.time().'.pdf';
		$mpdf->Output($nama_file_pdf,'I');
	}
	public function hapus()
	{
		$id = $this->input->post('rekapitulasi_id');
		$this->M_rekap->del($id);

		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('sukses', 'Data Berhasil Dihapus!');
			redirect(base_url('rekapitulasi'),'refresh');
		}
	}
}