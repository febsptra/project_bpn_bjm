<?php

class Hasil_permohonan extends CI_Controller
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
		$where = array('nama_pemohon' => $this->session->userdata('nama'));
		$data['hasil_permohonan'] = $this->m_bpn->get_where($where, 'hasil_permohonan')->result();
		$this->load->view('template/header');
		$this->load->view('permohonan/data_hasil_permohonan', $data);
		$this->load->view('template/footer');
	}
}
