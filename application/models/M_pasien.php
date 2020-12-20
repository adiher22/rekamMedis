<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pasien extends CI_Model {

	public function get($id = null){

		$this->db->from('pasien');
		if($id != null){
			$this->db->where('pasien_kd', $id);
		}
		$query = $this->db->get();
		return $query;
	}
	
	public function count($table) 
  {
    return $this->db->count_all($table);
  }

	public function add($post){

		$params['pasien_kd']  = $post['kd_pasien'];
        $params['nama_pasien'] = $post['nama_pasien'];
        $params['jenis_kelamin'] = $post['jenis_kelamin'];
		$params['no_hp'] = $post['no_hp'];
		$params['pekerjaan'] = $post['pekerjaan'];
        $params['usia'] = $post['umur'];
        $params['tempat_lahir'] = $post['tempat_lahir'];
        $params['tgl_lahir'] = $post['tgl_lahir'];
        $params['alamat'] = $post['alamat'];
		$this->db->insert('pasien', $params);
		
	}

	public function edit($post){
	
        $params['nama_pasien'] = $post['nama_pasien'];
        $params['jenis_kelamin'] = $post['jenis_kelamin'];
        $params['no_hp'] = $post['no_hp'];
        $params['usia'] = $post['umur'];
		$params['tempat_lahir'] = $post['tempat_lahir'];
		$params['pekerjaan'] = $post['pekerjaan'];
        $params['tgl_lahir'] = $post['tgl_lahir'];
        $params['alamat'] = $post['alamat'];

		$this->db->where('pasien_kd', $post['kd_pasien']);
		$this->db->update('pasien', $params);
	}
	function kd_pasien(){
        $q = $this->db->query("SELECT MAX(RIGHT(pasien_kd,3)) AS kd_max FROM pasien");
        $kd = "";
        $no = "PSN-";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return $no.date('ymd-').$kd; 
    }

	public function del($id)
	{
		$this->db->where('pasien_kd', $id);
		$this->db->delete('pasien');
	}

}

/* End of file M_pasien.php */
/* Location: ./application/models/M_pasien.php */