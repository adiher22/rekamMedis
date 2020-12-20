<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dokter extends CI_Model {

	public function get($id = null){

		$this->db->from('dokter');
		if($id != null){
			$this->db->where('dokter_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}
	public function count($table) 
	{
	  return $this->db->count_all($table);
	}
	public function add($post){

		
        $params['nama_dokter'] = $post['nama_dokter'];
        $params['jenis_kelamin'] = $post['jenis_kelamin'];
		$params['spesialis'] = $post['spesialis'];
		$params['fee_dokter'] = $post['fee_dokter'];
		$this->db->insert('dokter', $params);
		
	}

	public function edit($post){
		$params['nama_dokter'] = $post['nama_dokter'];
		$params['jenis_kelamin'] = $post['jenis_kelamin'];
		$params['spesialis'] = $post['spesialis'];
		$params['fee_dokter'] = $post['fee_dokter'];

		$this->db->where('dokter_id', $post['dokter_id']);
		$this->db->update('dokter', $params);
	}

	public function del($id)
	{
		$this->db->where('dokter_id', $id);
		$this->db->delete('dokter');
	}

}

/* End of file M_dokter.php */
/* Location: ./application/models/M_dokter.php */