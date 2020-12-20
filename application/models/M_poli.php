<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_poli extends CI_Model {

	public function get($id = null){

		$this->db->from('poli');
		if($id != null){
			$this->db->where('poli_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}
	public function count($table) 
  {
    return $this->db->count_all($table);
  }

	public function add($post){

		
        $params['nama_poli'] = $post['nama_poli'];
		$this->db->insert('poli', $params);
		
	}

	public function edit($post){
        $params['nama_poli'] = $post['nama_poli'];


		$this->db->where('poli_id', $post['poli_id']);
		$this->db->update('poli', $params);
	}

	public function del($id)
	{
		$this->db->where('poli_id', $id);
		$this->db->delete('poli');
	}
	public function cekPoli($id)
    {
		$query = $this->db->get_where('poli',array('poli_id' => $id));
        return $query->row_array();
    }
}

/* End of file M_dokter.php */
/* Location: ./application/models/M_dokter.php */