<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ranap extends CI_Model {

	public function get($id = null, $limit = null){
    
        $this->db->select('rawat_inap.*,
                            dokter.*,
                            pasien.*');

        $this->db->from('rawat_inap');
        $this->db->join('pasien', 'pasien.pasien_kd = rawat_inap.pasien_kd', 'left');
        $this->db->join('dokter', 'rawat_inap.dokter_id = dokter.dokter_id', 'left');
        $this->db->group_by('rawat_inap.no_rm');
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
    public function add($post)
    {
        $params['no_rm'] = $post['no_rm'];
        $params['pasien_kd'] = $post['pasien_kd'];
        $params['dokter_id'] = $post['dokter'];
        $params['tanggal_inap'] = $post['tanggal_inap'];
        $params['diagnosa'] = $post['diagnosa'];
        $params['no_kamar'] = $post['no_kamar'];
        $params['status_pasien'] = "Dirawat";

        $this->db->insert('rawat_inap', $params);
    }

    public function pembayaran($id)
    {
        $params['status_pasien'] = 'Pembayaran';

		$this->db->where('no_rm', $id);
		$this->db->update('rawat_inap', $params);
    }

    public function selesai($id)
    {
        $params['status_pasien'] = 'Selesai Bayar';

		$this->db->where('no_rm', $id);
		$this->db->update('rawat_inap', $params);
    }
    public function chartRanap($bulan)
    {
        $like = 'RKM-' . date('y') . $bulan;
        $this->db->like('no_rm', $like, 'after');
        return count($this->db->get('rawat_inap')->result_array());
    }
  public function count($table) 
  {
    return $this->db->count_all($table);
  }
}