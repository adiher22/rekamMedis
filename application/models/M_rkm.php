<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rkm extends CI_Model {

	public function get($id){
    
  
    $this->db->select('rekamedis.*,
                       r_rkm.*,
                       dokter.*,
                       obat.*,
                       r_obat.*');

    $this->db->from('r_rkm');
    // $this->db->join('pasien', 'pasien.pasien_kd = rekamedis.pasien_kd', 'left');
    $this->db->join('rekamedis', 'r_rkm.no_rm = rekamedis.no_rm', 'left');
    $this->db->join('r_obat', 'r_rkm.no_rm = r_obat.no_rm', 'left');
    $this->db->join('dokter', 'rekamedis.dokter_id = dokter.dokter_id', 'left');
    $this->db->join('obat', 'r_obat.obat_id = obat.obat_id', 'left');
    
    $this->db->where('r_rkm.no_rm', $id);
    $this->db->order_by('rekamedis.no_rm', 'desc'); 
    
    
		$query = $this->db->get();
		return $query;
    }
    public function get_ranap($id)
    {
     $this->db->select('rawat_inap.*,
            r_rkm.*,
            dokter.*,
            obat.*,
            r_obat.*');

    $this->db->from('r_rkm');
    // $this->db->join('pasien', 'pasien.pasien_kd = rekamedis.pasien_kd', 'left');
    $this->db->join('rawat_inap', 'r_rkm.no_rm = rawat_inap.no_rm', 'left');
    $this->db->join('r_obat', 'r_rkm.no_rm = r_obat.no_rm', 'left');
    $this->db->join('dokter', 'rawat_inap.dokter_id = dokter.dokter_id', 'left');
    $this->db->join('obat', 'r_obat.obat_id = obat.obat_id', 'left');

    $this->db->where('r_rkm.no_rm', $id);
    $this->db->order_by('rawat_inap.no_rm', 'desc'); 


    $query = $this->db->get();
    return $query;
    }
    public function get_rekap()
    {
     $this->db->select('rawat_inap.*,
            rekamedis.*,
            r_rkm.*,
            dokter.*,
            obat.*,
            r_obat.*,
            poli.*');

    $this->db->from('r_rkm');
    // $this->db->join('pasien', 'pasien.pasien_kd = rekamedis.pasien_kd', 'left');
    $this->db->join('rawat_inap', 'r_rkm.no_rm = rawat_inap.no_rm', 'left');
    $this->db->join('rekamedis', 'rekamedis.no_rm = r_rkm.no_rm', 'left');
    $this->db->join('r_obat', 'r_rkm.no_rm = r_obat.no_rm', 'left');
    $this->db->join('dokter', 'rawat_inap.dokter_id = dokter.dokter_id', 'left');
    $this->db->join('obat', 'r_obat.obat_id = obat.obat_id', 'left');
    $this->db->join('poli', 'poli.poli_id = rekamedis.poli_id', 'left');
    $this->db->group_by('r_rkm.no_rm');
    $this->db->order_by('r_rkm.no_rm', 'desc'); 

    $query = $this->db->get();
    return $query;
    }
  public function get_report_rjn($where)
	{
    $this->db->select('rekamedis.*,
    r_rkm.*,
    dokter.*,
    poli.*,
    ');

    $this->db->from('r_rkm');
    // $this->db->join('pasien', 'pasien.pasien_kd = rekamedis.pasien_kd', 'left');
  
    $this->db->join('rekamedis', 'rekamedis.no_rm = r_rkm.no_rm', 'left');
    $this->db->join('dokter', 'rekamedis.dokter_id = dokter.dokter_id', 'left');
    $this->db->join('poli', 'poli.poli_id = rekamedis.poli_id', 'left');
 
    
    $this->db->where($where);
		$this->db->order_by('r_rkm.no_rm', 'desc');
		$query = $this->db->get();
		return $query;
  }
  public function get_report_rnp($where)
	{
    $this->db->select('rawat_inap.*,
    r_rkm.*,
    dokter.*,
    pasien.*,
    ');

    $this->db->from('r_rkm');
    // $this->db->join('pasien', 'pasien.pasien_kd = rekamedis.pasien_kd', 'left');
  
    $this->db->join('rawat_inap', 'rawat_inap.no_rm = r_rkm.no_rm', 'left');
    $this->db->join('dokter', 'rawat_inap.dokter_id = dokter.dokter_id', 'left');
    $this->db->join('pasien', 'rawat_inap.pasien_kd = pasien.pasien_kd', 'left');
    
    
    $this->db->where($where);
		$this->db->order_by('r_rkm.no_rm', 'desc');
		$query = $this->db->get();
		return $query;
	}
    public function get_last($table, $limit, $order)
    {
     $this->db->select('rawat_inap.*,
            rekamedis.*,
            r_rkm.*,
            dokter.*,
            poli.*,
            pasien.nama_pasien AS nama_passien');

    $this->db->from('r_rkm');
   
    $this->db->join('rawat_inap', 'rawat_inap.no_rm = r_rkm.no_rm', 'left');
    $this->db->join('rekamedis', 'rekamedis.no_rm = r_rkm.no_rm', 'left');
    $this->db->join('dokter', 'rekamedis.dokter_id = dokter.dokter_id', 'left');
    $this->db->join('pasien', 'rawat_inap.pasien_kd = pasien.pasien_kd', 'left');
    $this->db->join('poli', 'poli.poli_id = rekamedis.poli_id', 'left');
    $this->db->group_by('r_rkm.no_rm');
    $this->db->limit($limit);
    $this->db->order_by('r_rkm.no_rm', 'desc'); 

    $query = $this->db->get();
    return $query;
    }
    
    public function add_r_obat($post){

      $params['no_rm'] = $post['no_rm'];
      $params['obat_id'] = $post['obat_id'];
      $params['harga'] = $post['harga'];
      $params['jumlah'] = $post['jumlah'];
      $params['total'] = $post['total'];
      $this->db->insert('r_obat', $params);
  
}


public function add_rkm($post){

  
  $params['no_rm'] = $post['no_rm'];
  $params['fee_dokter'] = $post['fee_dokter'];
  $params['fee_admin'] = $post['fee_admin'];
  $params['harga_total'] = $post['fee_dokter'] + $post['fee_admin'] + $post['total_obat'];
  $this->db->insert('r_rkm', $params);

}
public function get_where($table, $data = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get($table)->result_array();
        }
    }
public function get_r_obat($id)
{
  
            $this->db->select('rekamedis.*,
                              r_rkm.*,
                              obat.*,
                              SUM(r_obat.total) AS total_obat');

          $this->db->from('r_obat');
          // $this->db->join('pasien', 'pasien.pasien_kd = rekamedis.pasien_kd', 'left');
          $this->db->join('rekamedis', 'r_obat.no_rm = rekamedis.no_rm', 'left');
          $this->db->join('r_rkm', 'r_rkm.no_rm = r_obat.no_rm', 'left');
          $this->db->join('obat', 'r_obat.obat_id = obat.obat_id', 'left');

        
          $this->db->where('r_obat.no_rm', $id);   
          $this->db->order_by('r_obat.no_rm', 'desc');
          $query = $this->db->get();
          return $query;
}
public function get_ranap_obat($id)
{
      
      $this->db->select('rawat_inap.*,
      r_rkm.*,
      obat.*,
      SUM(r_obat.total) AS total_obat');

    $this->db->from('r_obat');
    // $this->db->join('pasien', 'pasien.pasien_kd = rekamedis.pasien_kd', 'left');
    $this->db->join('rawat_inap', 'r_obat.no_rm = rawat_inap.no_rm', 'left');
    $this->db->join('r_rkm', 'r_rkm.no_rm = r_obat.no_rm', 'left');
    $this->db->join('obat', 'r_obat.obat_id = obat.obat_id', 'left');


    $this->db->where('r_obat.no_rm', $id);   
    $this->db->order_by('r_obat.no_rm', 'desc');
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

}