<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat_permohonan extends CI_Controller
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
		$where = array('id_user' => $this->session->userdata('id_user'));
		$data['permohonan_hm'] = $this->m_bpn->get_where($where, 'permohonan_hm')->result();
		$data['permohonan_hgb'] = $this->m_bpn->get_where($where, 'permohonan_hgb')->result();
		$this->load->view('template/header');
		$this->load->view('permohonan/riwayat_permohonan', $data);
		$this->load->view('template/footer');
	}
}
