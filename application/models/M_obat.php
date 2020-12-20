<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_obat extends CI_Model {

	public function get($id = null){

		$this->db->from('obat');
		if($id != null){
			$this->db->where('obat_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}
	public function count($table) 
  {
    return $this->db->count_all($table);
  }

  public function get_robat($id = null)
  {
	$this->db->select('obat.*,
						r_obat.*,
						rekamedis.*,
						r_rkm.*');
	
	$this->db->from('r_obat');
	$this->db->join('obat', 'r_obat.obat_id = obat.obat_id', 'left');
	$this->db->join('rekamedis', 'rekamedis.no_rm = r_obat.no_rm', 'left');
	$this->db->join('r_rkm', 'r_obat.no_rm = r_rkm.no_rm', 'left');
	
	$this->db->group_by('r_obat.r_obat_id');
	$this->db->order_by('r_obat.no_rm', 'desc');
	if($id != null){
		$this->db->where('r_obat.no_rm', $id);
	}
	$query = $this->db->get();
	return $query;
  }

	public function add($post){

		
        $params['nama_obat'] = $post['nama_obat'];
		$params['stok'] = $post['stok'];
		$params['harga'] = $post['harga'];
		$this->db->insert('obat', $params);
		
	}

	public function edit($post){
        $params['nama_obat'] = $post['nama_obat'];
		$params['stok'] = $post['stok'];
		$params['harga'] = $post['harga'];

		$this->db->where('obat_id', $post['obat_id']);
		$this->db->update('obat', $params);
	}

	public function del($id)
	{
		$this->db->where('obat_id', $id);
		$this->db->delete('obat');
	}

	public function cekObat($id)
    {
		$query = $this->db->get_where('obat',array('obat_id' => $id));
        return $query->row_array();
	}
	
	public function min($table, $field, $min)
    {
        $field = $field . ' <=';
        $this->db->where($field, $min);
        return $this->db->get($table)->result_array();
    }

	
}

/* End of file M_dokter.php */
/* Location: ./application/models/M_dokter.php */