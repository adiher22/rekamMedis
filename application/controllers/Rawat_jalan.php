<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rawat_jalan extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_rekamedis');
		$this->load->model('M_poli');
		$this->load->model('M_pasien');
		$this->load->model('M_obat');
		$this->load->model('M_dokter');
		$this->load->model('M_rkm');
		
		
		check_admin();
		
		check_not_login();
		
	}
	
	public function index()
	{
		$data = [   'title' => 'Data Pasien Rawat Jalan',
					'row' => $this->M_rekamedis->get()];
		$this->template->load('template', 'rekamedis/rekamedis', $data);
	}

	public function add()
	{
		
        
		$this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'trim|required', 
		array(	'required' => '%s Harus Diisi'));
        
        $this->form_validation->set_rules('dokter', 'Nama Dokter', 'trim|required', 
        array(	'required' => '%s Harus Diisi'));

        $this->form_validation->set_rules('tensi', 'Tensi Darah', 'trim|required', 
        array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_rules('poli', 'Poli', 'trim|required', 
		array(	'required' => '%s Harus Diisi'));
                                                                                                                                                                                                
	$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

	if($this->form_validation->run() == FALSE) {
		
        $data['no_rm'] = $this->M_rekamedis->get_no_invoice();
        $data['pasien'] = $this->M_pasien->get()->result();
        $data['dokter'] = $this->M_dokter->get();
		$data['obat'] = $this->M_obat->get();
		$data['poli'] = $this->M_poli->get();
		$this->template->load('template', 'rekamedis/tambah', $data);
	}else {
		$post = $this->input->post(null, TRUE);
		$this->M_rekamedis->add($post);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('sukses', 'Data Berhasil Ditambahkan');
			redirect(base_url('rawat_jalan'),'refresh');
		}
		
	}




	}
	public function periksa($id)
	{
		$data = [   'title' => 'Data Pasien Rawat Jalan',
					'row' => $this->M_rekamedis->get($id)];
		$this->template->load('template', 'rekamedis/rekamedis', $data);

		
		$this->M_rekamedis->periksa($id);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('sukses', 'Data Berhasil Diperbarui');
			redirect(base_url('rawat_jalan'),'refresh');
		}
		
	}
	public function pembayaran($id)
	{
		$data = [   'title' => 'Data Pasien Rawat Jalan',
					'row' => $this->M_rekamedis->get($id)];
		$this->template->load('template', 'rekamedis/rekamedis', $data);

		
		$this->M_rekamedis->bayar($id);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('sukses', 'Data Berhasil Diperbarui');
			redirect(base_url('rawat_jalan'),'refresh');
		}
		
	}

	public function report()
	{
		
	    $this->form_validation->set_rules('dari', 'Dari Tanggal', 'trim|required', 
			array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_rules('sampai', 'Sampai Tanggal', 'trim|required', 
			array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if($this->form_validation->run() == FALSE) {
			$data['title'] = "Laporan Rawat Jalan";
			$this->template->load('template', 'rekamedis/laporan', $data);
		}else {
			$dari = $this->input->post('dari', TRUE);
			$sampai = $this->input->post('sampai', TRUE);

				$where = ['rekamedis.tgl_periksa >=' => $dari, 'rekamedis.tgl_periksa <=' => $sampai, 
						  'rekamedis.status' => 'Selesai Bayar'];
				$data['report'] = $this->M_rkm->get_report_rjn($where);
			
		
				$data['title'] = "Laporan Rawat Jalan";
				// var_dump($data);
				// die;
	        	$this->template->load('template', 'rekamedis/lap_rkm',$data);
						
		}

	}
	public function cetak()
	{

	    
			$dari = $this->input->get('dari', TRUE);
			$sampai = $this->input->get('sampai', TRUE);
			if($dari != "" || $sampai != "") {
				$where = ['rekamedis.tgl_periksa >=' => $dari, 'rekamedis.tgl_periksa <=' => $sampai,
				'rekamedis.status' => 'Selesai Bayar'];
				$data['report'] = $this->M_rkm->get_report_rjn($where);
		
				$data['title'] = "Laporan Data Rawat Jalan";
				// var_dump($data);
				// die;
	        	$this->load->view('rekamedis/cetak',$data);
			}else{
				
				redirect(base_url('rekamedis/report'),'refresh');
				
			}
			
	}
	public function cetak_pdf() 
	{
		$dari = $this->input->get('dari', TRUE);
		$sampai = $this->input->get('sampai', TRUE);
		if($dari != "" || $sampai != "") {
			$where = ['rekamedis.tgl_periksa >=' => $dari, 'rekamedis.tgl_periksa <=' => $sampai,
					  'rekamedis.status' => 'Selesai Bayar'];
			$data['report'] = $this->M_rkm->get_report_rjn($where);
		
			$data['title'] = "Laporan Data Rawat Jalan";
			// var_dump($data);
		}

		$html = $this->load->view('rekamedis/cetak_pdf', $data, TRUE);
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
		$id = $this->input->post('rekamedis_id');
		$this->M_rekamedis->del($id);

		if($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Berhasil Dihapus');</script>";
			}
			echo "<script>window.location='".site_url('rekamedis')."';</script>";

	}


}