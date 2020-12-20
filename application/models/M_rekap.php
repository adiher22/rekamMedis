<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rekap extends CI_Model {

	public function get($id = null){

		$this->db->from('rekapitulasi');
		if($id != null){
			$this->db->where('rekapitulasi_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}
	public function get_budget($id = null){
		$this->db->from('budget_klinik');
		if($id != null) {
			$this->db->where('budget_id', $id);
		}

		$query = $this->db->get();
		return $query;
	}

	public function get_report($where)
	{
		$this->db->select('rekapitulasi.*,
						  SUM(rekapitulasi.jml_rekap) AS total_rekapitulasi');
		$this->db->from('rekapitulasi');
		$this->db->group_by('rekapitulasi.rekapitulasi_id');
		$this->db->where($where);
		$this->db->order_by('rekapitulasi_id', 'desc');
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params['budget_id'] = $post['budget_id'];
		$params['jenis_pendapatan'] = $post['jenis_pendapatan'] != "" ? $post['jenis_pendapatan'] : null;
		$params['lap_pendapatan'] = $post['lap_pendapatan']  != "" ? $post['lap_pendapatan'] : null;
		$params['jenis_pengeluaran'] = $post['jenis_pengeluaran'] != "" ? $post['jenis_pengeluaran'] : null;
		$params['lap_pengeluaran'] = $post['lap_pengeluaran'] != "" ? $post['lap_pengeluaran'] : null;
		$params['tgl_input'] = $post['tgl_input'];
		$params['jml_rekap'] = (int)$post['lap_pendapatan'] - (int)$post['lap_pengeluaran'];

		$this->db->insert('rekapitulasi', $params);

	}

	public function del($id)
	{
		$this->db->where('rekapitulasi_id', $id);
		$this->db->delete('rekapitulasi');
	}
}