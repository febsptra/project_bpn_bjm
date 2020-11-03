<?php

class Tabel_user extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('id_user'))) {
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-danger alert-dismissible fade show" role="alert">
					 Silahkan Login terlebihdahulu!
					 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					 <span aria-hidden="true">&times;</span>
					 </button></div>'
			);
			redirect('auth/login/');
		}
	}

	public function index()
	{
		$data['data'] = $this->m_bpn->table('user')->result();
		$this->load->view('template/header');
		$this->load->view('admin/master_data_user', $data);
		$this->load->view('template/footer');
	}

	function edit()
	{
		$data = array(
			'level' => $this->input->post('level')
		);

		$where = array(
			'id_user' => $this->input->post('id_user')
		);

		$this->m_bpn->update($where, $data, 'user');
		$this->session->set_flashdata(
			'edit_sukses',
			'<br><div class="alert alert-success alert-dismissible fade show" role="alert">
					 Data Berhasil Diperbarui.
					 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					 <span aria-hidden="true">&times;</span>
					 </button></div>'
		);

		redirect('admin/data_user');
	}
}
