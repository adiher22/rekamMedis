<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rekamedis extends CI_Model {

	public function get($id = null, $limit = null){
    
  
    $this->db->select('rekamedis.*,
                       dokter.*,
                       poli.*,
                       pasien.*');

    $this->db->from('rekamedis');
    $this->db->join('pasien', 'pasien.pasien_kd = rekamedis.pasien_kd', 'left');
    $this->db->join('dokter', 'rekamedis.dokter_id = dokter.dokter_id', 'left');
    $this->db->join('poli', 'poli.poli_id = rekamedis.poli_id', 'left');
    $this->db->group_by('rekamedis.no_rm');
    $this->db->order_by('no_rm', 'desc');  
    
		if($id != null){
      $this->db->where('no_rm', $id);
      
    }
    if ($limit != null) {
      $this->db->limit($limit);
    }
    
    
		$query = $this->db->get();
		return $query;
    }
    public function get_robat($id = null){

		$this->db->from('r_obat');
		if($id != null){
			$this->db->where('r_obat_id', $id);
		}
		$query = $this->db->get();
		return $query;
    }
    
    public function get_dokter($id = null){

		$this->db->from('dokter');
		if($id != null){
			$this->db->where('dokter_id', $id);
		}
		$query = $this->db->get();
		return $query;
    }
    public function get_obat($id = null){

		$this->db->from('obat');
		if($id != null){
			$this->db->where('obat_id', $id);
		}
		$query = $this->db->get();
		return $query;
    }

	public function add($post){

		
        $params['no_rm'] = $post['no_rm'];
        $params['pasien_kd'] = $post['pasien_kd'];
        $params['nama_pasien'] = $post['nama_pasien'];
        $params['tgl_periksa'] = $post['tanggal'];
        $params['dokter_id'] = $post['dokter'];
        $params['tensi_darah'] = $post['tensi'];
        $params['diagnosa'] = $post['diagnosa'];
        $params['poli_id'] = $post['poli'];
        $params['nomor_kartu'] = $post['no_kartu'] != "" ? $post['no_kartu'] : null;
        $params['status'] = "Antrian";
		$this->db->insert('rekamedis', $params);
		
	}

	public function periksa($id){
        $params['status'] = 'Periksa';

		$this->db->where('no_rm', $id);
		$this->db->update('rekamedis', $params);
  }
  
  public function bayar($id){
        $params['status'] = 'Pembayaran';

		$this->db->where('no_rm', $id);
		$this->db->update('rekamedis', $params);
  }
  public function selesai_bayar($id){
  $params['status'] = 'Selesai Bayar';

  $this->db->where('no_rm', $id);
  $this->db->update('rekamedis', $params);
  }

	public function del($id)
	{
		$this->db->where('no_rm', $id);
		$this->db->delete('rekamedis');
    }

  public function report($where)
  {
    $this->db->select('rekamedis.*');
    $this->db->from('rekamedis');
    $this->db->group_by('rekamedis.no_pendaftaran');
    $this->db->where($where);
    $this->db->order_by('no_pendaftaran', 'desc');
    $query = $this->db->get();
    return $query;
    
    
    
    
    
    
  }
    
    function get_no_invoice(){
        $q = $this->db->query("SELECT MAX(RIGHT(no_rm,3)) AS kd_max FROM rekamedis WHERE DATE(tgl_periksa)=CURDATE()");
        $kd = "";
        $no = "RKM-";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return $no.date('ymd-').$kd; 
    }

    function ranap_invo(){
      $q = $this->db->query("SELECT MAX(RIGHT(no_rm,3)) AS kd_max FROM rawat_inap WHERE DATE(tanggal_inap)=CURDATE()");
      $kd = "";
      $no = "RKM-";
      if($q->num_rows()>0){
          foreach($q->result() as $k){
              $tmp = ((int)$k->kd_max)+1;
              $kd = sprintf("%04s", $tmp);
          }
      }else{
          $kd = "0001";
      }
      date_default_timezone_set('Asia/Jakarta');
      return $no.date('ymd-').$kd; 
  }
  
  public function count($table) 
  {
    return $this->db->count_all($table);
  }
  public function chartRekamedis($bulan)
    {
        $like = 'RKM-' . date('y') . $bulan;
        $this->db->like('no_rm', $like, 'after');
        return count($this->db->get('rekamedis')->result_array());
    }

}

/* End of file M_rekamedis.php */
/* Location: ./application/models/M_rekamedis.php */