<?php

class m_bpn extends CI_Model
{

	public function table($tabel)
	{
		return $this->db->get($tabel);
	}

	public function insert($data, $stable)
	{
		$this->db->insert($stable, $data);
	}

	public function get_where($where, $stable)
	{
		return $this->db->get_where($stable, $where);
	}

	public function update($where, $data, $stable)
	{
		$this->db->where($where);
		$this->db->update($stable, $data);
	}

	public function delete($where, $stable)
	{
		$this->db->where($where);
		$this->db->delete($stable);
	}

	// function join($table, $table2, $id)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from($table);
	// 	$this->db->join($table2, $table2 . $id = $table . $id);
	// 	$query = $this->db->get();
	// 	return $query;
	// }

	public function cek_login()
	{
		$username = set_value('username');
		$password = set_value('password');

		$result = $this->db->where('username', $username)
			->where('password', $password)
			->limit(1)
			->get('user');
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return array();
		}
	}

	public function cek_password()
	{
		$id_user = $this->session->userdata('id_user');
		$password = set_value('konfirmasi_password');

		$result = $this->db->where('id_user', $id_user)
			->where('password', $password)
			->limit(1)
			->get('user');
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return array();
		}
	}

	public function hm_menunggu()
	{
		$sql = "SELECT  count(if(status='Menunggu', no, NULL)) as total
				FROM permohonan_hm";
		$result = $this->db->query($sql);
		return $result->row();
	}

	public function hm_diukur()
	{
		$sql = "SELECT  count(if(status='Pengukuran', no, NULL)) as total
				FROM permohonan_hm";
		$result = $this->db->query($sql);
		return $result->row();
	}

	public function hgb_menunggu()
	{
		$sql = "SELECT  count(if(status='Menunggu', no, NULL)) as total
				FROM permohonan_hgb";
		$result = $this->db->query($sql);
		return $result->row();
	}

	public function hgb_diukur()
	{
		$sql = "SELECT  count(if(status='Pengukuran', no, NULL)) as total
				FROM permohonan_hgb";
		$result = $this->db->query($sql);
		return $result->row();
	}

	public function pengukuran()
	{
		$sql = "SELECT  count(if(status='Menunggu', no, NULL)) as total
				FROM pengukuran";
		$result = $this->db->query($sql);
		return $result->row();
	}

	public function hasil_pengukuran()
	{
		$sql = "SELECT  count(if(status='Belum Dibuat', no_hasil_pengukuran, NULL)) as total
				FROM hasil_pengukuran";
		$result = $this->db->query($sql);
		return $result->row();
	}
}
