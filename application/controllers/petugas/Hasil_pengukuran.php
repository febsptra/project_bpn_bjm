<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil_pengukuran extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('tgl_indo');
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
		$data['hasil_pengukuran'] = $this->m_bpn->table('hasil_pengukuran')->result();
		$this->load->view('template/header');
		$this->load->view('petugas/hasil_pengukuran', $data);
		$this->load->view('template/footer');
	}
}
