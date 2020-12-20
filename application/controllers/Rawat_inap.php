<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rawat_inap extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_rekamedis');
		$this->load->model('M_ranap');
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
		$data = [   'title' => 'Data Pasien Rawat Inap',
					'row' => $this->M_ranap->get()];
		
		$this->template->load('template', 'ranap/rawat_inap', $data);
    }

    public function add_($id)
	{
		
        
		$this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'trim|required', 
		array(	'required' => '%s Harus Diisi'));
        
        $this->form_validation->set_rules('dokter', 'Nama Dokter', 'trim|required', 
        array(	'required' => '%s Harus Diisi'));

		$this->form_validation->set_rules('no_kamar', 'Nomor Kamar', 'trim|required', 
		array(	'required' => '%s Harus Diisi'));
                                                                                                                                                                                                
	$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

	if($this->form_validation->run() == FALSE) {
		
        // $data['no_rm'] = $this->M_rekamedis->get_no_invoice();
        $data['rm'] = $this->M_rekamedis->get($id)->row();
        $data['pasien'] = $this->M_pasien->get()->result();
        $data['dokter'] = $this->M_dokter->get();
		$data['obat'] = $this->M_obat->get();
		$data['poli'] = $this->M_poli->get();
		$this->template->load('template', 'ranap/tambah', $data);
	}else {
		$post = $this->input->post(null, TRUE);
		$this->M_ranap->add($post);
		$this->M_rekamedis->del($id);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('sukses', 'Data Berhasil Ditambahkan');
			redirect(base_url('rawat_inap'),'refresh');
		}
		
	}
   }
   public function pembayaran($id)
   {
	   $data = [   'title' => 'Data Pasien Rawat Jalan',
				   'row' => $this->M_ranap->get($id)];
	   $this->template->load('template', 'ranap/rawat_inap', $data);

	   
	   $this->M_ranap->pembayaran($id);
	   if($this->db->affected_rows() > 0) {
		   $this->session->set_flashdata('sukses', 'Data Berhasil Diperbarui');
		   redirect(base_url('rawat_inap'),'refresh');
	   }
	   
   }
   public function selesai($id)
   {
	   $data = [   'title' => 'Data Pasien Rawat Jalan',
				   'row' => $this->M_ranap->get($id)];
	   $this->template->load('template', 'ranap/rawat_inap', $data);

	   
	   $this->M_ranap->selesai($id);
	   if($this->db->affected_rows() > 0) {
		   $this->session->set_flashdata('sukses', 'Data Berhasil Diperbarui');
		   redirect(base_url('rawat_inap'),'refresh');
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
			$data['title'] = "Laporan Rawat Inap";
			$this->template->load('template', 'ranap/laporan', $data);
		}else {
			$dari = $this->input->post('dari', TRUE);
			$sampai = $this->input->post('sampai', TRUE);

				$where = ['rawat_inap.tanggal_inap >=' => $dari, 'rawat_inap.tanggal_inap <=' => $sampai, 
						  'rawat_inap.status_pasien' => 'Selesai Bayar'];
				$data['report'] = $this->M_rkm->get_report_rnp($where);
			
		
				$data['title'] = "Laporan Rawat Inap";
				// var_dump($data);
				// die;
	        	$this->template->load('template', 'ranap/lap_rnp',$data);
						
		}

	}
	public function cetak()
	{

	    
			$dari = $this->input->get('dari', TRUE);
			$sampai = $this->input->get('sampai', TRUE);
			if($dari != "" || $sampai != "") {
				$where = ['rawat_inap.tanggal_inap >=' => $dari, 'rawat_inap.tanggal_inap <=' => $sampai, 
						  'rawat_inap.status_pasien' => 'Selesai Bayar'];
				$data['report'] = $this->M_rkm->get_report_rnp($where);
		
				$data['title'] = "Laporan Data Rawat Inap";
				// var_dump($data);
				// die;
	        	$this->load->view('ranap/cetak_',$data);
			}else{
				
				redirect(base_url('rawat_inap/report'),'refresh');
				
			}
			
	}
	public function cetak_pdf() 
	{
		$dari = $this->input->get('dari', TRUE);
		$sampai = $this->input->get('sampai', TRUE);
		if($dari != "" || $sampai != "") {
		$where = ['rawat_inap.tanggal_inap >=' => $dari, 'rawat_inap.tanggal_inap <=' => $sampai, 
						  'rawat_inap.status_pasien' => 'Selesai Bayar'];
			$data['report'] = $this->M_rkm->get_report_rnp($where);
		
			$data['title'] = "Laporan Data Rawat Inap";
			// var_dump($data);
		}

		$html = $this->load->view('ranap/cetak_pdf', $data, TRUE);
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
}